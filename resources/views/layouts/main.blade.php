<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loftflix</title>

	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/slick.css" />
	<link rel="stylesheet" type="text/css" href="/css/slick-theme.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<livewire:styles>
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body class="font-sans bg-black text-white">
	<nav class="border-b border-black">
		<div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
			<ul class="flex flex-col md:flex-row items-center">
				<li>
					<a href="{{ route('movies.index') }}"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="25" viewBox="0 0 100 25">
  <image width="100" height="25" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAAAZCAYAAADHXotLAAAFV0lEQVRoge2aeYhXVRTHP+Ms6kiOmuHWWFp/RBaVpX8k2o5twxAS5T9lUU6B7ZItEAUJ4dAqERhZZqR/FEFatEE5YRuV7es0bVOZMTXqLOmMvjhynp0O7/d79/fm/Wag+sLjnXvvOefed869526vIoqic4ADgRHA78BThKMBOB+YCYwDtgFvAauBdxK0zAfuBCr0GZbw1AB3AI+r7nuAPpWPDL+F6KoEFmj9U4A3NK8f2KM8KC16qoHngCWafxqwUusS3ruAJ1MsIe27HOgFtgNXAt1atgiYA/RoG9YB7yboWKS23wX8SBRF/dHf6IiiiMDnvqg4rk7QszhFJsbNyn9VIH+M+So3LZB/k2nbQld2e4Admp3M+CLf2pIgP8Px3C097SfjrR8Cx8bZwDUpPPfryLPYGah/uL6rA/ljxCNnTyB/raF7XNn2APkOQ3e7elcBnSYto2Wsk1/o0s1VTsnegEZIGHjY5T2i4WqmhqUYtwA3OFkLCY+fajoOLeKEDZr3ghpZQsJu4ELgVCO/HGhTvRKGthRos4SL1zQcVqrOkaburOg3ckmhVJxyoymXtj9tyi8x9IvAVhk2bWbIvBcwTGe5YbbGlXeass9c2cVO9vgSQqQ8tzr5MQX4pjq+xgDdjU7mugCZpYa/14UseSY7nStMWYMrO1PyvUdDcKjjedWlWw1d68oilz6kxLrHu/RhgXKTS6wnL/wMbDa6Fhj6dEN3AS+RMMRC4MNOjUuHhL3/Ep413zodmKH0cSZ/fWy3LA7xBvcOqjJ06OQaiiztHWpscvWfq++5Jm9NTFRlaKwPO/0uXVmkzCOt3KOiNPb96A7kKwfe3re/gHrVLSvUMa6e/YuRPEKWh3VYmgF3lMsKDmN1KV2t35zUEX1b076zFNgN5jzgJpNusR2mHA4pBj+6ZGf8CvAm8L4uQ48dgP5CWK57LHm+1/cSx5tl7vPfUwiripSttIk8QlYp8M48Sh8Lv3nKA6P0sZjm0lnmO+vEYUU6q+yVngHOc/mt/qhqsCfJkNGV90KgEP4cpHpijEvI+9ZnZBkhA4EfXQ/oKmSvGqivyG57ILhNDytr9ZtHlXBMlAeOAE5K0HMKcBDwW5zhHVLqqicNaZP62gInoHmjVeeOocKyAvWK/Zv0BHwfyhGyrM60ibI+pTwv+GXmYGI0cJGpb727mriskPGywhvdjoqBLACGGnm1fZ6zc5Pbvcvx0cQ4kcUhXma3S/cZOs+1/ECQxbghMiEb1TmGbtW91+uOZ3ZMlCNkTTR0yJ3CYCBLx+gN4ElbEYrDFpv0an236O49RlNM+Ek9pFdsdelLdXJG19mTTNlgTNghyOKQ64EztEd36WXTLl0FblQe65CkfUiDW+5+aGi5Yr5A6bOAA+QCzzvEhp9qXR7KxDtB76q79GzG4mTgA93+n+jKHnRp3+BSz6b8pnF4AT7/XX5TmATftsP18fjGOMS2vyIh4jQZus8dNH7pZBuBJ7wCORp+Xs/wZZ3eDnwEvGxC0c6EY4djEpxxL/Cxy/P3GSMTPrgY5CO+Bj7R3tZRgLdH2/257pLbA3SHzjPWZiMMXel0TNWDxBiPukPOtfwT8oME8tdJW8IxQhKE5zuT3wwsTeATo60w8dJitjZymzpWzrF+CTREuVEHnKBGrtNRVaehZLSGninaGa7VtlwBPGTaZW20wRy1C45WWQtZ/s4y6XpxSKdWXAyRetz3tCN1ZBwM/KG90t8g/ptRo7eRE9SGm80oaNZLqEn6e9XcBDss09+NYjSLQ7bo3yE7NATIyugr4Ff1dvxu//82MHfIiHtM7V8HfPEXZnGz1ZLbYEUAAAAASUVORK5CYII="/>
	</svg>
					</a>
				</li>
				<li class="md:ml-16 mt-3 md:mt-0">
					<a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
				</li>
				<li class="md:ml-6 mt-3 md:mt-0">
					<a href="{{ route('tv.index') }}" class="hover:text-gray-300">TV Shows</a>
				</li>
				<li class="md:ml-6 mt-3 md:mt-0">
					<a href="{{ route('actors.index') }}" class="hover:text-gray-300">Actors</a>
				</li>
			</ul>
			<livewire:search-dropdown>
		</div>
	</nav>
	@yield('content')
	<livewire:scripts>
	@yield('scripts')

	<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
			effect: 'fade',
			autoplay: {
				delay: 8000,
				disableOnInteraction: false,
			},
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
	
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script>
		$('.responsive').slick({
			dots: false,
			infinite: false,
			speed: 600,
			slidesToShow: 5,
			slidesToScroll: 4,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: true,
						dots: true
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]
		});
	</script>
	
</body>
</html>