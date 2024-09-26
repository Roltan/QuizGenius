<?php

namespace App\Filament\Admin\Resources\RelationQuestResource\Pages;

use App\Filament\Admin\Resources\RelationQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRelationQuests extends ListRecords
{
    protected static string $resource = RelationQuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
