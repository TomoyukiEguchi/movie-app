<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $tvshow;
    public $similarTvshows;

    public function __construct($tvshow, $similarTvshows)
    {
        //
        $this->tvshow = $tvshow;
        $this->similarTvshows = $similarTvshows;
    }

    public function tvshow() {

        return collect($this->tvshow)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$this->tvshow['poster_path'],
            'vote_average' => $this->tvshow['vote_average'] * 10 .'%',
            'first_air_date' => Carbon::parse($this->tvshow['first_air_date'])->format('M d, Y'),
            'genres' => collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->tvshow['credits']['crew'])->take(2),
            'cast' => collect($this->tvshow['credits']['cast'])->take(5),
            'images' => collect($this->tvshow['images']['backdrops'])->take(6),
        ])->only([
            'poster_path', 'id', 'genres', 'name', 'vote_average', 'overview', 'first_air_date', 'credits',
            'videos', 'images', 'crew', 'cast', 'images', 'created_by', 'number_of_seasons'
        ])->dump();
    }

    public function similarTvShows() {

        return collect($this->similarTvshows)->map(function($similarTvshow) {
            return collect($similarTvshow)->merge([
                'backdrop_path' => $similarTvshow['backdrop_path']
                    ? 'https://image.tmdb.org/t/p/w780/' .$similarTvshow['backdrop_path']
                    : 'https://via.placeholder.com/780x439',
            ])->only([
                'id', 'backdrop_path', 'name'
            ]);
        })->dump();
    }
}
