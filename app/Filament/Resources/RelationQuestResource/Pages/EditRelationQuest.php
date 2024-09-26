<?php

namespace App\Filament\Resources\RelationQuestResource\Pages;

use App\Filament\Resources\RelationQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRelationQuest extends EditRecord
{
    protected static string $resource = RelationQuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
