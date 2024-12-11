<?php

namespace App\Http\Resources\Card;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $test = $this->test;

        return [
            'href' => '/solved' . '/' . $this->id,
            'span' => [
                $this->student->name,
                $this->score . '/' . $test->maxScore(),
                $test->title,
                $this->created_at->format('d-m-Y')
            ]
        ];
    }
}
