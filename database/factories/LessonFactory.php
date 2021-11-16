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
        $verb = ['did ', 'is ', 'was ', 'will ','would '];
        $subject = ['Humans ', 'Animals ', 'Dinosaurs ', 'Celestials ', 'Forsaken ', 'Ilegal '.'Fairies ','Simon ','Military ',
        'Magical beigns ','Fantastic beasts ','Adamant gems ','Mavis  ', 'Spiritual ghosts ','Clase de ','Gray '.'Red ','Blue ',
        'Velociraptors ','Eustreptospondylus ','Gargoyles ','Royalty ','Imperials ','Miraculous holders ','Brilliant man ',
        'Computational madness','A ethorical question','Methafor ','Academy ','Christmas ','Halloween ','Easter '];
        $secVerb = ['defeat ', 'treat ', 'help ', 'discover ', 'use ', 'make illegal ', 'legalize ','destroy ','buy ', 'hit ',
                    'sue ','watch ','marry ','replace ','help ','wish ','laugh at ','love ','hate ','play with ','cry about '];
        $pred = ['in the 1970s ', 'in America ', 'in Colombia ', 'Vol. 3 '. '101 ', 'Part II ', '- The Sequel ','- Strikes Back ',
                    '& Knuckles ','Funky mode ','- A True Story ','- The Theatrical Experience ', '- The Musical ','in Spanish',
                    'in space ','in a Galaxy Far Far Away...','as seen in TV ','owned by Disney '];

        return [
            'title' => $this->faker->randomElement($hw).$this->faker->randomElement($verb).$this->faker->randomElement($subject).$this->faker->randomElement($secVerb).$this->faker->randomElement($subject).$this->faker->randomElement($pred).'?',
            'course_id' => Course::all()->random()->getId(),
            'body' => $this->faker->text(4000),
        ];
    }
}
