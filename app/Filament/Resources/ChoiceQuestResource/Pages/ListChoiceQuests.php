<?php

namespace App\Filament\Admin\Resources\ChoiceQuestResource\Pages;

use App\Filament\Admin\Resources\ChoiceQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChoiceQuests extends ListRecords
{
    protected static string $resource = ChoiceQuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
