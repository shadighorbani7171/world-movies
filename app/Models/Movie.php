<?php

namespace App\Models;

use App\Observers\MovieObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[ObservedBy(MovieObserver::class)]
class Movie extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getPosterAttribute($image){
        return Storage::temporaryUrl($image , now()->addDays(1));
    }
    public function images(){
        return $this->hasMany(MovieImage::class);

       
    }

    public function people(){
        return $this->hasMany(FilmPerson::class);

       
    }

   public function genres(){
    return $this->belongsToMany(Genre::class ,MovieGenre::class);
   }
   public function moviegenre(){
    return $this->hasMany(MovieGenre::class);

}
}
