<?php

namespace App\Observers;

use App\Models\Cast;
use Illuminate\Support\Str;

class CastObserver
{   
    public function creating(Cast $cast): void
    {
        $cast->slug = Str::slug($cast->name);
    }

    /**
     * Handle the Cast "created" event.
     */
    public function created(Cast $cast): void
    {
        //
    }

    /**
     * Handle the Cast "updated" event.
     */
    public function updated(Cast $cast): void
    {
        //
    }

    /**
     * Handle the Cast "deleted" event.
     */
    public function deleted(Cast $cast): void
    {
        //
    }

    /**
     * Handle the Cast "restored" event.
     */
    public function restored(Cast $cast): void
    {
        //
    }

    /**
     * Handle the Cast "force deleted" event.
     */
    public function forceDeleted(Cast $cast): void
    {
        //
    }
}
