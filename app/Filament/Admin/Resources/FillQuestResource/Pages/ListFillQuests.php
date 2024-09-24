<?php

namespace App\Filament\Admin\Resources\FillQuestResource\Pages;

use App\Filament\Admin\Resources\FillQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFillQuests extends ListRecords
{
    protected static string $resource = FillQuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
