<?php

namespace App\Filament\Resources\BlankQuestResource\Pages;

use App\Filament\Resources\BlankQuestResource;
use App\Models\BlankQuest;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlankQuest extends EditRecord
{
    protected static string $resource = BlankQuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function fillForm(): void
    {
        $data = $this->record->toArray();

        // Преобразуем JSON-строку обратно в массив
        if (is_string($data['correct'])) {
            $correctArray = json_decode($data['correct'], true);

            // Проверяем, является ли массив ожидаемого формата
            if (is_array($correctArray) && !isset($correctArray[0]['answer'])) {
                $data['correct'] = array_map(fn($answer) => ['answer' => $answer], $correctArray);
            } else {
                $data['correct'] = $correctArray;
            }
        }

        $this->form->fill($data);
    }
}
