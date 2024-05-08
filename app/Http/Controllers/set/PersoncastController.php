<?php

namespace App\Http\Controllers\set;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\FilmPerson;
use App\Models\FilmPersonCast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class PersoncastController extends Controller
{

        
    public function storepeople(Request $request){
         $person = new FilmPerson;
         $person->name = $request->name;
         $person->bio = $request->bio;
         $person->slug = $request->slug;
         $uploadimage = $request->image;
         $name= Uuid::uuid4()->toString();
         $upload = Storage::put($name ,$uploadimage);
         $person->image = $upload;
          
         $person->save();
    }

    public function storecast(Request $request){
    $cast = new Cast;
    $cast->name = $request->name;
    $cast->slug = $request->slug;

    $cast->save();
}
      
    public function createpeoplecast(Request $request){
            $personcast = new FilmPersonCast;
            $personcast->film_person_id = $request->film_person_id;
            $personcast->cast_id = $request->cast_id;

            $personcast->save();
    }
}
