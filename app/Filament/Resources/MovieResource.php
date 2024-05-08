<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovieResource\Pages;
use App\Filament\Resources\MovieResource\RelationManagers;
use App\Filament\Resources\MovieResource\RelationManagers\GenresRelationManager;
use App\Filament\Resources\MovieResource\RelationManagers\ImagesRelationManager;
use App\Filament\Resources\MovieResource\RelationManagers\PeopleRelationManager;
use App\Models\Cast;
use App\Models\FilmPerson;
use App\Models\Genre;
use App\Models\Movie;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovieResource extends Resource
{
    protected static ?string $model = Movie::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title'),
                TextInput::make('country'),
                TextInput::make('year')->numeric(),
                TextInput::make('imdb_rating')->numeric()->inputMode('decimal'),
                FileUpload::make('poster')->nullable(),
                Select::make('genre_id')
                ->label('genre')
                ->options(Genre::all()->pluck('name', 'id'))
                ->searchable(),
              
                 Select::make('film_person_id')
                ->label('filmperson')
                  ->options([
               
                (FilmPerson::all()->pluck('name', 'id')),
                  ]),
           
          


                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('poster'),
                TextColumn::make('title')->searchable(),
                TextColumn::make('country'),
                TextColumn::make('year')->numeric(),
                TextColumn::make('imdb_rating'),
                TextColumn::make('genres.name'),
               
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            
                
                GenresRelationManager::class,
                PeopleRelationManager::class,
                ImagesRelationManager::class
                
             
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMovies::route('/'),
            'create' => Pages\CreateMovie::route('/create'),
            'view' => Pages\ViewMovie::route('/{record}'),
            'edit' => Pages\EditMovie::route('/{record}/edit'),
        ];
    }
}
