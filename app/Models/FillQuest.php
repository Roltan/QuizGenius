<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class FillQuest extends Model
{
    use HasFactory;

    private $fillable = [
        'topic_id',
        'vis',
        'quest',
        'options',
        'is_multiple',
    ];

    // связи
    public function topic(): BelongsToMany
    {
        return $this->belongsToMany(Topic::class);
    }

    public function questsTest(): MorphOne
    {
        return $this->morphOne(QuestsTest::class, 'quest');
    }
}
