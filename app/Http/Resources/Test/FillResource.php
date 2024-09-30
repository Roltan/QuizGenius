<?php

namespace App\Http\Resources\Test;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => $this->type
        ];
    }
}
