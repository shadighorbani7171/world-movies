<?php

namespace App\Filament\Resources\FilmPersonResource\Pages;

use App\Filament\Resources\FilmPersonResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFilmPerson extends ViewRecord
{
    protected static string $resource = FilmPersonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
