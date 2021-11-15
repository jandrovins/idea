<?php

//Author: Simón Flórez Silva

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hw = ['What ', 'Who ', 'Why ', 'How ', 'When '];
        $verb = ['did ', 'is ', 'was ', 'will '];
        $subject = ['Colombia ', 'tesla ', 'dinosaurs ', 'some man ', 'the indies '];
        $secVerb = ['defeat ', 'treat ', 'help ', 'discover ', 'use ', 'make illegal ', 'legalize '];
        $secSbj = ['dinosaurs', 'american', 'history', 'dogs', 'anime', 'technology'];

        return [
            'title' => $this->faker->randomElement($hw).$this->faker->randomElement($verb).$this->faker->randomElement($subject).$this->faker->randomElement($secVerb).$this->faker->randomElement($secSbj).'?',
            'course_id' => Course::all()->random()->getId(),
            'body' => $this->faker->text(4000),
        ];
    }
}
