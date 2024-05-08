<?php

namespace App\Filament\Resources\MovieResource\RelationManagers;

use App\Models\FilmPerson;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeopleRelationManager extends RelationManager
{
    protected static string $relationship = 'people';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('film_person_id')
                ->label('filmset')  
                ->options(FilmPerson::get()->pluck('name','id'))
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('people')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
