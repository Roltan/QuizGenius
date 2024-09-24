<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FillQuest;

class FillQuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10000; $i++) {
            FillQuest::factory()->create();
            $this->command->info("Created fill quest #$i");
        }
    }
}
