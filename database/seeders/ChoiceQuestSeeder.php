<?php

namespace Database\Seeders;

use App\Models\ChoiceQuest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChoiceQuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10000; $i++) {
            ChoiceQuest::factory()->create();
            $this->command->info("Created choice quest #$i");
        }
    }
}
