<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movie;
    public $hours;
    public $minutes;
    public $similarMovies;

    public function __construct($movie, $hours, $minutes, $similarMovies)
    {
        //
        $this->movie = $movie;
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->similarMovies = $similarMovies;
    }

    public function movie() {

        return collect($this->movie)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$this->movie['poster_path'],
            'vote_average' => $this->movie['vote_average'] * 10 .'%',
            'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->movie['credits']['crew'])->take(2),
            'cast' => collect($this->movie['credits']['cast'])->take(5),
            'images' => collect($this->movie['images']['backdrops'])->take(6),
        ])->only([
            'poster_path', 'id', 'genres', 'title', 'vote_average', 'overview', 'release_date', 'credits',
            'videos', 'images', 'crew', 'cast', 'images', 'runtime'
        ])->dump();
    }

    public function hours() {

        return $this->hours;
    }

    public function minutes() {

        return $this->minutes;
    }

    public function similarMovies() {

        return collect($this->similarMovies)->map(function($movie) {
            return collect($movie)->merge([
                'backdrop_path' => $movie['backdrop_path']
                    ? 'https://image.tmdb.org/t/p/w780/' .$movie['backdrop_path']
                    : 'https://via.placeholder.com/780x439',
            ])->only([
                'id', 'backdrop_path', 'title'
            ]);
        })->dump();
    }
}