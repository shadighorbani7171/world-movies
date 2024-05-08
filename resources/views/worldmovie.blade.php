@extends('app')

@section('content')







<div id="search" class="w-96 mx-auto mt-4 flex items-center justify-center">
    <label for="search-field" class="text-white font-bold">Search:</label>
    <input type="text" id="search-field" class="w-64 border border-gray-700 bg-black text-gray-600 px-2 py-1 ml-2">
    <button type="button" class="text-white font-bold ml-2 bg-gray-700 px-4 py-1 rounded cursor-pointer">Search</button>
</div>

@foreach ($movies as $movie)
<div id="main" class="border-b border-dashed border-gray-700 mx-auto mt-4 p-4 max-w-md text-center">
    <div id="content">
        <div class="box border-b border-dashed border-gray-700 pb-5">
            <div class="head pt-4 pb-3">
                <h2 class="text-orange-500 text-lg font-bold">{{$movie->title}}</h2>
            </div>
            <div class="movie flex items-center justify-center">
                <div class="movie-image relative">
                    <img src="{{'/storage'. $movie->image}}" alt="Movie Image" class="w-38 h-52 object-cover">
                    <div class="overlay absolute top-0 left-0 w-full h-full bg-black opacity-50"></div>
                    <div class="play hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.74 14.35l4.45-3.45a1 1 0 0 0 0-1.58L9.74 5.65A1 1 0 0 0 8 6.42v7.16a1 1 0 0 0 1.74.77z"></path>
                        </svg>
                    </div>
                </div>
                <div class="details ml-4">
                    <p class="text-gray-600">Year: {{$movie->year}}</p>
                    <p class="text-gray-600">Country: {{$movie->country}}</p>
                </div>
                <div class="rating ml-auto flex items-center">
                    <p class="text-white font-bold mr-2">{{$movie->imdb_rating}}</p>
                    <div class="stars bg-yellow-400 w-16 h-3">
                        <div class="stars-in bg-yellow-600 w-12 h-3"></div>
                    </div>
                </div>
            </div>
            <div class="comments bg-gray-700 px-4 py-1 mt-2"></div>
        </div>
    </div>
</div>
@endforeach

<div id="footer" class="pt-4 text-sm text-gray-600 text-center">
    <p>Footer content here</p>
</div>


@endsection
