@extends('app')

@section('content')






<div id="shell" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div id="header" class="relative">
        <h1 id="logo" class="absolute top-10 left-0">
            <a href="#" class="block w-60 h-12 bg-logo text-transparent">Logo</a>
        </h1>
        <div class="social absolute top-10 right-0">
            <span class="text-sm text-gray-600">Follow us:</span>
            <ul class="flex">
                
                <li class="mr-2">
                    <a href="#" class="block w-4 h-4 bg-facebook text-transparent"></a>
                </li>
                <li class="mr-2">
                    <a href="#" class="block w-4 h-4 bg-vimeo text-transparent"></a>
                </li>
                <li>
                    <a href="#" class="block w-4 h-4 bg-rss text-transparent"></a>
                </li>
            </ul>
        </div>
        <nav id="navigation" class="absolute top-10 right-0">
            <ul class="flex">
                <li class="mr-8">
                    <a href="#" class="text-white font-bold">Home</a>
                </li>
                <li>
                    <a href="#" class="text-white font-bold hover:text-red-500">About</a>
                </li>
            </ul>
        </nav>
    </div>
    <div id="sub-navigation" class="block clear-right border-t border-dashed border-gray-600 border-b border-dashed border-gray-600 py-2">
        <ul class="flex">
            <li class="mr-6">
                <a href="#" class="text-white font-bold hover:underline">Sub Link 1</a>
            </li>
            <li>
                <a href="#" class="text-white font-bold hover:underline">Sub Link 2</a>
            </li>
        </ul>
    </div>
    <div id="search" class="w-96 mx-auto mt-4">
        <label for="search-field" class="text-white font-bold inline-block">Search:</label>
        <input type="text" id="search-field" class="w-64 border border-gray-700 bg-black text-gray-600 px-2 py-1">
        <button type="button" class="text-white font-bold ml-2 cursor-pointer">Search</button>
    </div>
    @foreach ($movies as $movie)
    
   
    <div id="main" class="border-b border-dashed border-gray-700">
        <div id="content">
            <div class="box border-b border-dashed border-gray-700 pb-5">
                <div class="head pt-4 pb-3">
                    <h2 class="text-orange-500 text-base font-bold">{{$movie->title}}</h2>
                </div>
                <div class="movie flex items-center">
                    <div class="movie-image relative">
                        <img src= "{{'/storage'. $movie->image}}" alt="Movie Image" class="w-38 h-52">
                        <a href="#" class="block absolute top-0 left-0 w-full h-full"></a>
                        <div class="play hidden absolute top-0 left-0 w-full h-full bg-image-hover"></div>
                        <span class="name block font-bold text-white text-center mt-40">{{$movie->year}}</span>
                    </div>
                    <div class="play hidden absolute top-0 left-0 w-full h-full bg-image-hover"></div>
                        <span class="name block font-bold text-white text-center mt-40">{{$movie->country}}</span>
                    </div>
                    <div class="rating ml-4">
                        <p class="text-white font-bold">{{$movie->imdb_rating}}</p>
                        <div class="stars bg-stars w-16 h-3 ml-1">
                            <div class="stars-in bg-stars-in w-12 h-3"></div>
                        </div>
                    </div>
                    <div class="comments bg-comments pl-4 py-1"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div id="footer" class="pt-4 text-sm">
        <p class="text-gray-600">Footer content here</p>
 endsection
</div>

@endsection
