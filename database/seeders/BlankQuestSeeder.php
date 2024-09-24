<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlankQuest;

class BlankQuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10000; $i++) {
            BlankQuest::factory()->create();
            $this->command->info("Created blank quest #$i");
        }
    }
}
