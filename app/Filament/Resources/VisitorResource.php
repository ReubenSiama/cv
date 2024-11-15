<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorResource\Pages;
use App\Models\Visitor;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use App\Filament\Resources\VisitorResource\RelationManagers;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class VisitorResource extends Resource
{
    protected static ?string $model = Visitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ip_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('countryName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('regionName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cityName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->label('Lat / Long')
                    ->formatStateUsing(fn($record) => $record->latitude . ', ' . $record->longitude)
                    ->url(fn($record) => 'https://maps.google.com/?q=' . $record->latitude . ',' . $record->longitude)
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('visited_at')
                    ->label('Last Visit')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->filters([
                Tables\Filters\Filter::make('visited_at')
                ->form([
                    DatePicker::make('visited_at_from')
                    ->native(false),
                    DatePicker::make('visited_at_to')
                    ->native(false),
                ])
                ->query(function(Builder $query, array $data): Builder{
                    return $query->when($data['visited_at_from'], fn($query, $from) => $query->whereDate('visited_at', '>=', $from))
                        ->when($data['visited_at_to'], fn($query, $to) => $query->whereDate('visited_at', '<=', $to));
                })
            ])
            ->defaultSort('visited_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\VisitedPageRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitors::route('/'),
            'view' => Pages\ViewVisitor::route('/{record}'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Location Details')
                ->schema([
                    Infolists\Components\TextEntry::make('countryName'),
                        Infolists\Components\TextEntry::make('currencyCode'),
                        Infolists\Components\TextEntry::make('countryCode'),
                        Infolists\Components\TextEntry::make('regionCode'),
                        Infolists\Components\TextEntry::make('regionName'),
                        Infolists\Components\TextEntry::make('cityName'),
                        Infolists\Components\TextEntry::make('zipCode'),
                        Infolists\Components\TextEntry::make('latitude')
                            ->label('Lat / Long')
                            ->formatStateUsing(fn($record) => $record->latitude . ', ' . $record->longitude)
                            ->url(fn($record) => 'https://maps.google.com/?q=' . $record->latitude . ',' . $record->longitude)
                            ->openUrlInNewTab(),
                        Infolists\Components\TextEntry::make('areaCode'),
                        Infolists\Components\TextEntry::make('timezone'),
                ])
                ->columns(4)
                ->columnSpan(2),
                Infolists\Components\Section::make()
                ->schema([
                    Infolists\Components\TextEntry::make('ip_address'),
                    Infolists\Components\TextEntry::make('user_agent'),
                    Infolists\Components\TextEntry::make('visited_at')
                        ->label('Last Visit')
                        ->date('d/m/Y H:i:sA'),
                ])
                ->columnSpan(1),
            ])
            ->columns(3);
    }
}
