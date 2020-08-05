<div class="my-4 mx-1">
	<a href="{{ route('movies.show', $movie['id']) }}">
		<img src="{{ $movie['backdrop_path'] }}" alt="backdrop" class="hover:opacity-50 transition ease-in-out duration-150">
	</a>
	<div class="my-2">
		<a href="{{ route('movies.show', $movie['id']) }}" class="text-base text-gray-500 mt-2">{{ $movie['title'] }}</a>
	</div>
</div>
