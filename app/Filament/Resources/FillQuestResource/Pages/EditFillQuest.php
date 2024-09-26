<?php

namespace App\Filament\Resources\FillQuestResource\Pages;

use App\Filament\Resources\FillQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFillQuest extends EditRecord
{
    protected static string $resource = FillQuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
