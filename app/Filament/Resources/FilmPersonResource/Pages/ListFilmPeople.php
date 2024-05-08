<?php

namespace App\Filament\Resources\FilmPersonResource\Pages;

use App\Filament\Resources\FilmPersonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFilmPeople extends ListRecords
{
    protected static string $resource = FilmPersonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
