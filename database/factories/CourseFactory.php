<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->company,
            'learningStyle' => $this->faker->company,
            'categories' => $this->faker->company,
            'summary' => $this->faker->company,
            'price' => $this->faker->numberBetween($min = 200, $max = 9000),
        ];
    }
}
