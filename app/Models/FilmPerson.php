<?php

namespace App\Models;

use App\Observers\FilmPersonObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


#[ObservedBy(FilmPersonObserver::class)]
class FilmPerson extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function getImageAttribute($image){
        return Storage::temporaryUrl($image , now()->addDays(1));
    }

    

   public function casts(){
    return $this->belongsToMany(Cast::class ,FilmPersonCast::class);
   }
   public function peoplecast(){
    return $this->hasMany(FilmPersonCast::class);
   }
}
