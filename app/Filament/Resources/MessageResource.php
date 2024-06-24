<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Models\Message;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::unread()->count();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_read')
                    ->boolean()
                    ->alignCenter()
                    ->icon(fn (Message $record) => $record->is_read ? 'heroicon-s-envelope-open' : 'heroicon-s-envelope'),
                Tables\Columns\TextColumn::make('ip_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('m-d-Y H:i:s')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_read')
                    ->options([
                        1 => 'Read',
                        0 => 'Unread',
                    ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMessages::route('/'),
            'view' => Pages\ViewMessage::route('/{record}'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Infolists\Components\Section::make()
            ->schema([
                Infolists\Components\Section::make()
                ->schema([
                    Infolists\Components\TextEntry::make('name'),
                    Infolists\Components\TextEntry::make('email'),
                ])
                ->columns(2),
                Infolists\Components\Section::make()
                ->schema([
                    Infolists\Components\TextEntry::make('message'),
                ]),
            ])
            ->columnSpan(2),
            Infolists\Components\Section::make()
            ->schema([
                Infolists\Components\TextEntry::make('ip_address'),
                Infolists\Components\TextEntry::make('user_agent'),
            ])
            ->columnSpan(1),
        ])
        ->columns(3);
    }
}
