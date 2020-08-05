<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $nowPlayingMovies;
    public $topRatedMovies;
    public $upcomingMovies;


    public function __construct($popularMovies, $nowPlayingMovies, $topRatedMovies, $upcomingMovies)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->topRatedMovies = $topRatedMovies;
        $this->upcomingMovies = $upcomingMovies;
        $this->swiperSlideImages = $topRatedMovies;
    }

    public function popularMovies() {

        return $this->formatMovies($this->popularMovies);
    }

    public function nowPlayingMovies() {

        return $this->formatMovies($this->nowPlayingMovies);
    }

    public function topRatedMovies() {

        return $this->formatMovies($this->topRatedMovies);
    }

    public function upcomingMovies() {

        return $this->formatMovies($this->upcomingMovies);
    }

    public function swiperSlideImages() {

        return $this->formatImages($this->topRatedMovies);
    }

    private function formatMovies($movies) {

        return collect($movies)->map(function($movie) {
            return collect($movie)->merge([
                'backdrop_path' => $movie['backdrop_path']
                    ? 'https://image.tmdb.org/t/p/w780/' .$movie['backdrop_path']
                    : 'https://via.placeholder.com/780x439',
            ])->only([
                'poster_path', 'id', 'backdrop_path', 'title', 'vote_average', 'overview', 'release_date', 'genre_ids', 'genre'
            ]);
        })->dump();
    }

    private function formatImages($movies) {

        return collect($movies)->map(function($movie) {
            return collect($movie)->merge([
                'backdrop_path' => $movie['backdrop_path']
                    ? 'https://image.tmdb.org/t/p/w1280/' .$movie['backdrop_path']
                    : 'https://via.placeholder.com/780x439',
            ])->only([
                'poster_path', 'id', 'backdrop_path', 'title'
            ]);
        })->dump();
    }
}