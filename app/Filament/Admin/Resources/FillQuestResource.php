<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FillQuestResource\Pages;
use App\Filament\Admin\Resources\FillQuestResource\RelationManagers;
use App\Models\FillQuest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Topic;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class FillQuestResource extends Resource
{
    protected static ?string $model = FillQuest::class;

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
                Repeater::make('options')
                    ->label('Options')
                    ->schema([
                        TextInput::make('str')
                            ->label('Option')
                            ->required(),
                        Toggle::make('correct')
                            ->label('Correct')
                            ->default(false),
                    ])
                    ->columns(2)
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
                BooleanColumn::make('is_multiple')
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
            'index' => Pages\ListFillQuests::route('/'),
            'create' => Pages\CreateFillQuest::route('/create'),
            'edit' => Pages\EditFillQuest::route('/{record}/edit'),
        ];
    }
}
