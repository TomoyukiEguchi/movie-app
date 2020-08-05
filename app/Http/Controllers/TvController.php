<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\TvViewModel;
use App\ViewModels\TvShowViewModel;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularTv = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/popular?api_key='. env('TMDB_TOKEN'))
            ->json()['results'];

        //dd($popularMovies);

        $airingTodayTv = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/airing_today?api_key='. env('TMDB_TOKEN'))
            ->json()['results'];

        $topRatedTv = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/top_rated?api_key='. env('TMDB_TOKEN'))
            ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/tv/list?api_key='. env('TMDB_TOKEN'))
            ->json()['genres'];

        //dump($nowPlayingMovies);

        //$genresArray = Http::withToken(config('services.tmdb.token'))
        //    ->get('https://api.themoviedb.org/3/genre/movie/list?api_key='. env('TMDB_TOKEN'))
        //    ->json()['genres'];

        //$genres = collect($genresArray)->mapWithKeys(function ($genre){
        //    return [$genre['id'] => $genre['name']];
        //});

        //return view('index', [
        //    'popularMovies' => $popularMovies,
        //    'nowPlayingMovies' => $nowPlayingMovies,
        //]);

        $viewModel = new TvViewModel(
            $popularTv,
            $airingTodayTv,
            $topRatedTv,
            $genres,
        );

        return view('tv.index', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tvshow = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'. $id. '?api_key='. env('TMDB_TOKEN'). '&append_to_response=credits,videos,images')
            ->json();

        //dump($movie);

        $similarTvshows = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'. $id. '/similar?api_key='. env('TMDB_TOKEN'))
            ->json()['results'];

        dump($similarTvshows);

        $viewModel = new TvShowViewModel(
            $tvshow,
            $similarTvshows
        );

        return view('tv.show', $viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
