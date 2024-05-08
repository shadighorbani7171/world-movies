<?php

namespace App\Models;

use App\Observers\CastObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(CastObserver::class)]
class Cast extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function cast(){
        return $this->hasOne(Cast::class, 'id', 'genre_id');
    }
}
