<div class="my-4 mx-1">
	<a href="{{ route('tv.show', $tvshow['id']) }}">
		<img src="{{ $tvshow['backdrop_path'] }}" alt="backdrop" class="hover:opacity-50 transition ease-in-out duration-150">
	</a>
	<div class="my-2">
		<a href="{{ route('tv.show', $tvshow['id']) }}" class="text-base text-gray-500 mt-2">{{ $tvshow['name'] }}</a>
	</div>
</div>