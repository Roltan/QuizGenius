<?php

namespace App\Filament\Resources\ChoiceQuestResource\Pages;

use App\Filament\Resources\ChoiceQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChoiceQuest extends EditRecord
{
    protected static string $resource = ChoiceQuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
