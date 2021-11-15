<?php

//Author: Simón Flórez Silva

namespace Database\Factories;

use App\Models\Course;
use App\Models\Inscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inscription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->getId(),
            'course_id' => Course::all()->random()->getId(),
            'progress' => mt_rand(0, 100),
        ];
    }
}
