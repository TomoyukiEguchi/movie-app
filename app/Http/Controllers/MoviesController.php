<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];

        //dd($popularMovies);

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];

        $topRatedMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated')
            ->json()['results'];

        $upcomingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/upcoming')
            ->json()['results'];

        //dump($upcomingMovies);

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

        $viewModel = new MoviesViewModel(
            $popularMovies,
            $nowPlayingMovies,
            $topRatedMovies,
            $upcomingMovies,
        );

        return view('movies.index', $viewModel);
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
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
            ->json();
        
        $hours = floor($movie['runtime']/60);
        $minutes = $movie['runtime'] % 60;

        $similarMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $id. '/similar')
            ->json()['results'];

        //dump($similarMovies);

        $viewModel = new MovieViewModel(
            $movie,
            $hours,
            $minutes,
            $similarMovies
        );

        return view('movies.show', $viewModel);
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
