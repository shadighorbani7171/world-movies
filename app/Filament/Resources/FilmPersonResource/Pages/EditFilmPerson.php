<?php

namespace App\Filament\Resources\FilmPersonResource\Pages;

use App\Filament\Resources\FilmPersonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFilmPerson extends EditRecord
{
    protected static string $resource = FilmPersonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
