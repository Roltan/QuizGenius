<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChoiceQuestResource\Pages;
use App\Filament\Resources\ChoiceQuestResource\RelationManagers;
use App\Models\ChoiceQuest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Topic;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class ChoiceQuestResource extends Resource
{
    protected static ?string $model = ChoiceQuest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('topic_id')
                    ->label('Topic')
                    ->options(Topic::all()->pluck('topic', 'id'))
                    ->required(),
                Toggle::make('vis')
                    ->label('Visibility')
                    ->default(false),
                Textarea::make('quest')
                    ->label('Question')
                    ->required()
                    ->rows(3),
                Repeater::make('correct')
                    ->label('Correct Answers')
                    ->schema([
                        TextInput::make('answer')
                            ->label('Answer')
                            ->required(),
                    ])
                    ->columns(1)
                    ->required(),
                Repeater::make('uncorrect')
                    ->label('Incorrect Answers')
                    ->schema([
                        TextInput::make('answer')
                            ->label('Answer')
                            ->required(),
                    ])
                    ->columns(1)
                    ->required(),
                Toggle::make('is_multiple')
                    ->label('Multiple Answers')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('topic.topic')
                    ->label('Topic'),
                ToggleColumn::make('vis')
                    ->label('Visibility'),
                TextColumn::make('quest')
                    ->label('Question')
                    ->limit(50),
                TextColumn::make('correct')
                    ->label('Correct Answers')
                    ->limit(50),
                TextColumn::make('uncorrect')
                    ->label('Incorrect Answers')
                    ->limit(50),
                ToggleColumn::make('is_multiple')
                    ->label('Multiple Answers'),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChoiceQuests::route('/'),
            'create' => Pages\CreateChoiceQuest::route('/create'),
            'edit' => Pages\EditChoiceQuest::route('/{record}/edit'),
        ];
    }
}
