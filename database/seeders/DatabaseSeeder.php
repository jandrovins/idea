<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Review;
use App\Models\Inscription;
use App\Util\RandomImage;
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
        User::factory()->count(50)->create();
        Course::factory()->count(10)->create();
        Inscription::factory()->count(100)->create();
        Review::factory()->count(50)->create();
        Lesson::factory()->count(50)->create();
    }
}
