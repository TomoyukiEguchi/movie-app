@extends('layouts.main')

@section('content')

<div class="container mx-auto">
	<!-- Swiper -->
	<div class="swiper-container relative">
		<div class="swiper-wrapper">
			@foreach ($swiperSlideImages as $movie)
				<div class="swiper-slide bg-cover bg-center" style="background-image:url({{ $movie['backdrop_path'] }})">
				<a href="{{ route('movies.show', $movie['id']) }}">
					<div class="absolute bottom-0 inline-block p-5 bg-gray-900 text-4xl">{{ $movie['title'] }}</div>
				</a>
				</div>
			@endforeach	
		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination swiper-pagination-white"></div>
		<!-- Add Arrows -->
		<div class="swiper-button-next swiper-button-white"></div>
		<div class="swiper-button-prev swiper-button-white"></div>
	</div>
</div>

	<div class="container mx-auto px-4 pt-16">

		<!-- pouplar-movies -->
		<div class="popular-movies">
			<h2 class="uppercase tracking-wider text-gray-300 text-lg font-semibold">Popular Movies</h2>
			<section class="responsive slider">
				@foreach ($popularMovies as $movie)
					<x-movie-card :movie="$movie" />
				@endforeach
			</section>
		</div>

		<!-- now-playing-movies -->
		<div class="now-playing-movies pt-20">
			<h2 class="uppercase tracking-wider text-gray-300 text-lg font-semibold">Now Playing</h2>
				<section class="responsive slider">
					@foreach ($nowPlayingMovies as $movie)
						<x-movie-card :movie="$movie" />
					@endforeach
				</section>
		</div>

		<!-- top-rated-movies -->
		<div class="top-rated-movies pt-20">
			<h2 class="uppercase tracking-wider text-gray-300 text-lg font-semibold">Top Rated</h2>
				<section class="responsive slider">
					@foreach ($topRatedMovies as $movie)
						<x-movie-card :movie="$movie" />
					@endforeach
				</section>
		</div>

		<!-- upcoming-movies -->
		<div class="upcoming-movies py-20">
			<h2 class="uppercase tracking-wider text-gray-300 text-lg font-semibold">Upcoming</h2>
				<section class="responsive slider">
					@foreach ($upcomingMovies as $movie)
						<x-movie-card :movie="$movie" />
					@endforeach
				</section>
		</div>
	</div>
@endsection