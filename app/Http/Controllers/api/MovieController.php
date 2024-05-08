<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with(['genres', 'images' , 'people'])->paginate();
       
            return response()->json($movies);
        
}
}
