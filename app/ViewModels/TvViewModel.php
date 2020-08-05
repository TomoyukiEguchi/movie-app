<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public $popularTv;
    public $airingTodayTv;
    public $topRatedTv;
    public $genres;

    public function __construct($popularTv, $airingTodayTv, $topRatedTv, $genres)
    {
        $this->popularTv = $popularTv;
        $this->airingTodayTv = $airingTodayTv;
        $this->topRatedTv = $topRatedTv;
        $this->genres = $genres;
        $this->swiperSlideImages = $popularTv;
    }

    public function popularTv() {

        return $this->formatTv($this->popularTv);
    }

    public function airingTodayTv() {

        return $this->formatTv($this->airingTodayTv);
    }

    public function topRatedTv() {

        return $this->formatTv($this->topRatedTv);
    }

    public function swiperSlideImages() {

        return $this->formatImages($this->popularTv);
    }
    

    public function genres() {

        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatTv($tv) {

        return collect($tv)->map(function($tvshow){
            $genresFormatted = collect($tvshow['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($tvshow)->merge([
                'backdrop_path' => $tvshow['backdrop_path']
                    ? 'https://image.tmdb.org/t/p/w780/' .$tvshow['backdrop_path']
                    : 'https://via.placeholder.com/780x439',
                'vote_average' => $tvshow['vote_average']*10 .'%',
                'first_air_date' => Carbon::parse($tvshow['first_air_date'])->format('M d, Y'),
                'genres' => $genresFormatted,
            ])->only([
                'genre_ids', 'name', 'vote_average', 'poster_path', 'genres', 'id', 'first_air_date', 'overview', 'backdrop_path'
            ]);
        })->dump();
    }

    private function formatImages($tv) {

        return collect($tv)->map(function($tvshow) {
            return collect($tvshow)->merge([
                'backdrop_path' => $tvshow['backdrop_path']
                    ? 'https://image.tmdb.org/t/p/w1280/' .$tvshow['backdrop_path']
                    : 'https://via.placeholder.com/1280x720',
            ])->only([
                'poster_path', 'id', 'backdrop_path', 'name'
            ]);
        })->dump();
    }
}