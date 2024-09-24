<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuestsTest;
use App\Models\Test;

class QuestsTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tests = Test::all();
        $j = 1;

        foreach ($tests as $test) {
            for ($i = 1; $i <= 10; $i++) { // Создаем 10 вопросов для каждого теста
                QuestsTest::factory()->create([
                    'test_id' => $test->id,
                ]);
                $this->command->info("Created quests test  #" . $j);
                $j++;
            }
        }
    }
}
