<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FilmPersonResource\Pages;
use App\Filament\Resources\FilmPersonResource\RelationManagers;
use App\Filament\Resources\FilmPersonResource\RelationManagers\CastsRelationManager;
use App\Models\Cast;
use App\Models\FilmPerson;
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

class FilmPersonResource extends Resource
{
    protected static ?string $model = FilmPerson::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('bio'),
                FileUpload::make('image'),
                Select::make('cast_id')
                ->label('casts')
                ->options(Cast::all()->pluck('name', 'id'))
                ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')->searchable(),
                TextColumn::make('bio'),
                TextColumn::make('movies.name'),
                TextColumn::make('casts.name'),
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
            CastsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFilmPeople::route('/'),
            'create' => Pages\CreateFilmPerson::route('/create'),
            'view' => Pages\ViewFilmPerson::route('/{record}'),
            'edit' => Pages\EditFilmPerson::route('/{record}/edit'),
        ];
    }
}
