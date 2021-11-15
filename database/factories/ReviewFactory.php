<?php

//Author: Simón Flórez Silva

namespace Database\Factories;

use App\Models\Inscription;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ins = Inscription::all()->random();

        return [
            'user_id' => $ins->getUserId(),
            'course_id' => $ins->getCourseId(),
            'rating' => random_int(0, 10),
            'comment' => $this->faker->realText($maxNbChars = 200),
        ];
    }
}
