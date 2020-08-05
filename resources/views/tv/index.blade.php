@extends('layouts.main')

@section('content')

<div class="container mx-auto">
	<!-- Swiper -->
	<div class="swiper-container relative">
		<div class="swiper-wrapper">
			@foreach ($swiperSlideImages as $tvshow)
				<div class="swiper-slide bg-cover bg-center" style="background-image:url({{ $tvshow['backdrop_path'] }})">
				<a href="{{ route('tv.show', $tvshow['id']) }}">
					<div class="absolute bottom-0 inline-block p-5 bg-gray-900 text-4xl">{{ $tvshow['name'] }}</div>
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

		<!-- Popular Shows -->
		<div class="popular-tv">
			<h2 class="uppercase tracking-wider text-gray-300 text-lg font-semibold">Popular Shows</h2>
			<!--<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">-->
            <section class="responsive slider">
                @foreach ($popularTv as $tvshow)
                    <x-tv-card :tvshow="$tvshow" />
                @endforeach
            </section>
        </div>
        
        <!-- airing Today Tv Shows -->
		<div class="airing-today-tv pt-20">
			<h2 class="uppercase tracking-wider text-gray-300 text-lg font-semibold">Airing Today Tv</h2>
                <section class="responsive slider">
                    @foreach ($airingTodayTv as $tvshow)
                        <x-tv-card :tvshow="$tvshow" />
                    @endforeach
                </section>
		</div>

		<!-- Top Rated Shows -->
		<div class="top-rated-shows py-20">
			<h2 class="uppercase tracking-wider text-gray-300 text-lg font-semibold">Top Rated Shows</h2>
                <section class="responsive slider">
                    @foreach ($topRatedTv as $tvshow)
                        <x-tv-card :tvshow="$tvshow" />
                    @endforeach
                </section>
		</div>

	</div>
@endsection