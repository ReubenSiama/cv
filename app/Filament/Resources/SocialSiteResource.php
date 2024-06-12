<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialSiteResource\Pages;
use App\Filament\Resources\SocialSiteResource\RelationManagers;
use App\Models\SocialSite;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialSiteResource extends Resource
{
    protected static ?string $model = SocialSite::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255)
                    ->activeUrl(),
                Forms\Components\FileUpload::make('icon')
                    ->image(),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('icon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->modalWidth('md'),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSocialSites::route('/'),
        ];
    }
}
