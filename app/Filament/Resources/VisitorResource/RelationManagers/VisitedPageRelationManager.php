<?php

namespace App\Filament\Resources\VisitorResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitedPageRelationManager extends RelationManager
{
    protected static string $relationship = 'VisitedPages';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('visited_route'),
                Tables\Columns\TextColumn::make('visited_at')
                    ->dateTime(),
            ])
            ->defaultSort('visited_at', 'desc');
    }
}
