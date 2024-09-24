<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'solved_test_id ',
        'quest_test_id',
        'answer'
    ];

    // связи
    public function solvedTest(): BelongsTo
    {
        return $this->belongsTo(SolvedTest::class);
    }

    public function questsTest(): BelongsTo
    {
        return $this->belongsTo(QuestsTest::class);
    }
}
