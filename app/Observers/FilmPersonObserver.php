<?php

namespace App\Observers;

use App\Models\FilmPerson;
use Illuminate\Support\Str;

class FilmPersonObserver
{
    public function creating( FilmPerson $filmPerson): void
    {
        $filmPerson->slug = Str::slug($filmPerson->name);
    }

    /**
     * Handle the FilmPerson "created" event.
     */
    public function created(FilmPerson $filmPerson): void
    {
        //
    }

    /**
     * Handle the FilmPerson "updated" event.
     */
    public function updated(FilmPerson $filmPerson): void
    {
        //
    }

    /**
     * Handle the FilmPerson "deleted" event.
     */
    public function deleted(FilmPerson $filmPerson): void
    {
        //
    }

    /**
     * Handle the FilmPerson "restored" event.
     */
    public function restored(FilmPerson $filmPerson): void
    {
        //
    }

    /**
     * Handle the FilmPerson "force deleted" event.
     */
    public function forceDeleted(FilmPerson $filmPerson): void
    {
        //
    }
}
