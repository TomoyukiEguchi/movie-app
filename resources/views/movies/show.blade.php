@extends('layouts.main')

@section('content')
	<div class="movie-info border-b border-black">
		<div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
			<div class="flex-none">
				<img src="{{ $movie['poster_path'] }}" alt="poster" class="lg:w-96">
			</div>
			<div class="md:ml-24">
				<h2 class="text-4xl mt-4 md:mt-0 text-gray-300 font-semibold">{{ $movie['title'] }}</h2>
				<div class="flex flex-wrap items-center text-gray-400 text-sm">
					<svg class="fill-current w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
					<span class="ml-1">{{ $movie['vote_average'] }}</span>
					<span class="mx-2">|</span>
					<span class="ml-1">{{ $movie['release_date'] }}</span>
					<span class="mx-2">|</span>
						{{ $movie['genres'] }}
					<span class="mx-2">|</span>
					<span class="ml-1">@if($hours > 1){{ $hours }} hrs @else{{ $hours }} hr @endif{{ $minutes }} min</span>
				</div>

				<p class="text-gray-400 mt-8">
					{{ $movie['overview'] }}
				</p>

				<div class="mt-12">
					<h4 class="text-white font-semibold">Featured Crew</h4>
					<div class="flex mt-4">
						@foreach ($movie['crew'] as $crew)
								<div class="mr-16">
									<div class="text-sm text-gray-500">{{ $crew['job'] }}</div>
									<div class="text-base text-gray-400">{{ $crew['name'] }}</div>
								</div>
						@endforeach
					</div>
				</div>

				<div x-data="{ isOpen:false }">
					@if (count($movie['videos']['results']) > 0)
						<div class="mt-12">
							<button 
								@click="isOpen = true"
								class="inline-flex items-center bg-transparent hover:bg-gray-200 text-gray-600 hover:text-gray-900 border border-gray-500 hover:border-transparent rounded text-xs px-3 py-2 transition ease-in-out duration-150"
							>
								<span>WATCH TRAILER</span>
							</button>
						</div>
					
					<template x-if="isOpen">
						<div
							style="background-color: rgba(0, 0, 0, .5);"
							class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
						>
							<div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
								<div class="bg-gray-900 rounded">
									<div class="flex justify-end pr-4 pt-2">
										<button
											@click="isOpen = false"
											@keydown.escape.window="isOpen = false"
											class="text-3xl leading-none hover:text-gray-300">&times;
										</button>
									</div>
									<div class="modal-body px-8 py-8">
										<div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
											<iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
					</template>
					@endif
				</div>

			</div>
		</div>
	</div>

	<div class="movie-info border-b border-black">
		<div class="container mx-auto px-4 py-16">
			<h2 class="text-2xl text-gray-300 font-normal">Cast</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
				@foreach ($movie['cast'] as $cast)
					<div class="mt-8">
						<a href="{{ route('actors.show', $cast['id']) }}">
							@if ( !$cast['profile_path'] == null )
								<img src="{{ 'https://image.tmdb.org/t/p/w500/'. $cast['profile_path'] }}" alt="profile" class="hover:opacity-75 transition ease-in-out duration-150">
							@else
								<img src="https://via.placeholder.com/500x750" alt="profile">
							@endif
						</a>
						<div class="mt-2">
							<a href="{{ route('actors.show', $cast['id']) }}" class="text-base mt-2 hover:text-gray:400">{{ $cast['name'] }}</a>
							<div class="text-sm text-gray-500">{{ $cast['character'] }}</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	@if (!$similarMovies->isEmpty())
	<div class="movie-OtherMovies">
		<div class="container mx-auto px-4 py-16">
			<h2 class="text-2xl text-gray-300 font-normal">Other Movies</h2>
			<section class="responsive slider">
			<!--<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">-->
				@foreach ($similarMovies as $movie)
					<x-movie-card :movie="$movie" />
				@endforeach
			</section>
		</div>
	</div>
	@endif

@endsection