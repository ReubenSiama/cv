<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationExperienceResource\Pages;
use App\Http\Enums\EducationExperience as EnumsEducationExperience;
use App\Models\EducationExperience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EducationExperienceResource extends Resource
{
    protected static ?string $model = EducationExperience::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $label = 'Education & Experience';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                ->schema([
                    Forms\Components\Select::make('type')
                    ->options(EnumsEducationExperience::class)
                    ->default(EnumsEducationExperience::Experience)
                    ->native(false)
                    ->required(),
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('subtitle')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\DatePicker::make('start_date')
                        ->required()
                        ->native(false),
                    Forms\Components\DatePicker::make('end_date')
                        ->native(false),
                    Forms\Components\TextInput::make('link')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('location')
                        ->maxLength(255)
                        ->default(null)
                        ->columnSpanFull(),
                    Forms\Components\RichEditor::make('content')
                        ->columnSpanFull(),
                ])
                ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date('m/d/Y'),
                Tables\Columns\TextColumn::make('end_date')
                    ->date('m/d/Y'),
                Tables\Columns\TextColumn::make('link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options(EnumsEducationExperience::class),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEducationExperiences::route('/'),
            'create' => Pages\CreateEducationExperience::route('/create'),
            'edit' => Pages\EditEducationExperience::route('/{record}/edit'),
        ];
    }
}
