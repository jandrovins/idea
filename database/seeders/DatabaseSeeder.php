<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Inscription;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        User::factory()->count(100)->create();
        Course::factory()->count(30)->create();
        Inscription::factory()->count(250)->create();
        Review::factory()->count(125)->create();
        Lesson::factory()->count(90)->create();
    }
}
