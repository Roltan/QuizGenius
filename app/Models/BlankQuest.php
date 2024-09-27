<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class BlankQuest extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id',
        'vis',
        'quest',
        'correct'
    ];

    // связи
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function questsTest(): MorphOne
    {
        return $this->morphOne(QuestsTest::class, 'quest');
    }

    // методы
    public function save(array $options = []): bool
    {
        if (is_array($this->correct)) {
            // Преобразуем массив ["answer" => "dolores"] в ["dolores"]
            $this->correct = json_encode(array_column($this->correct, 'answer'));
        }

        return parent::save($options);
    }
}
