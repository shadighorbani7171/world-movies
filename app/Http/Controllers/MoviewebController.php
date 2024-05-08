<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MoviewebController extends Controller
{
   public function index(){
    $movies = Movie::with(['genres', 'images' , 'people'])->paginate();

    return view('worldmovie',['movies' =>$movies]);
   }
}
