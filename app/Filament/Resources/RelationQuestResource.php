<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RelationQuestResource\Pages;
use App\Filament\Resources\RelationQuestResource\RelationManagers;
use App\Models\RelationQuest;
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

class RelationQuestResource extends Resource
{
    protected static ?string $model = RelationQuest::class;

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
                Repeater::make('first_column')
                    ->label('First Column')
                    ->schema([
                        TextInput::make('item')
                            ->label('Item')
                            ->required(),
                    ])
                    ->columns(1)
                    ->required(),
                Repeater::make('second_column')
                    ->label('Second Column')
                    ->schema([
                        TextInput::make('item')
                            ->label('Item')
                            ->required(),
                    ])
                    ->columns(1)
                    ->required(),
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
                TextColumn::make('first_column')
                    ->label('First Column')
                    ->limit(50),
                TextColumn::make('second_column')
                    ->label('Second Column')
                    ->limit(50),
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
            'index' => Pages\ListRelationQuests::route('/'),
            'create' => Pages\CreateRelationQuest::route('/create'),
            'edit' => Pages\EditRelationQuest::route('/{record}/edit'),
        ];
    }
}
