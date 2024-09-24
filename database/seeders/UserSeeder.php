<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.ru',
                'password' => hash('sha256', 'admin'),
                'is_admin' => true
            ],
            [
                'name' => 'tester',
                'email' => 'test@test.ru',
                'password' => hash('sha256', 'test1234'),
                'is_admin' => false
            ],
            [
                'name' => 'teacher',
                'email' => 'teacher@teacher.ru',
                'password' => hash('sha256', 'teacher1'),
                'is_admin' => false
            ],
            [
                'name' => 'student',
                'email' => 'student@student.ru',
                'password' => hash('sha256', 'student1'),
                'is_admin' => false
            ],
        ]);
    }
}
