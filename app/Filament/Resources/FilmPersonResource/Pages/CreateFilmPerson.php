<?php

namespace App\Filament\Resources\FilmPersonResource\Pages;

use App\Filament\Resources\FilmPersonResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFilmPerson extends CreateRecord
{
    protected static string $resource = FilmPersonResource::class;
}
