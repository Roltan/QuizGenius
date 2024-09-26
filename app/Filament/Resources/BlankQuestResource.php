<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlankQuestResource\Pages;
use App\Filament\Resources\BlankQuestResource\RelationManagers;
use App\Models\BlankQuest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Topic;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class BlankQuestResource extends Resource
{
    protected static ?string $model = BlankQuest::class;

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
                Textarea::make('correct')
                    ->label('Correct Answer')
                    ->required()
                    ->rows(3),
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
                    ->label('Correct Answer')
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
            'index' => Pages\ListBlankQuests::route('/'),
            'create' => Pages\CreateBlankQuest::route('/create'),
            'edit' => Pages\EditBlankQuest::route('/{record}/edit'),
        ];
    }
}
