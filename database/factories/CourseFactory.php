<?php

//Author: Simón Flórez Silva

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use App\Util\RandomImage;
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
        $hw = ['Human ', 'Animal ', 'Dinosaur ', 'Celestial ', 'Forsaken ', 'Ilegal '.'Fairy ','Simon\'s ','Militar ',
                'Magical ','Fantastic ','Adamant ','Mavis\' ', 'Spiritual ','Clase de ','Gray '.'Red ','Blue ',
                'Velociraptor ','Eustreptospondylus ','Gargoyle ','Royal ','Imperial ','Miraculous ','Brilliant ',
                'Computational ','Rethorical ','Methaforical ','Academical ','Christmas ','Halloween ','Easter'];
        $subject = ['history ', 'technology ', 'science ', 'culture ', 'astronomy ', 'whitchcraft ', 'husbandry ','magic ',
                    'Civil War ','computation ','cinema ','pets ','sports ','astrology ','clod ','diamond ', 'hunting ',
                    'marriage ','mathematics ','theatre ','musicology ','mythology ','botany ','anatomy ','zoology ',
                    'scientology ','philosophy ','psycology ','calculus ','analysis ','genetics ','studies ','paleonthology'];
        $secSbj = ['in the 1970s ', 'in America ', 'in Colombia ', 'Vol. 3 '. '101 ', 'Part II ', '- The Sequel ','- Strikes Back ',
                    '& Knuckles ','Funky mode ','- A True Story ','- The Theatrical Experience ', '- The Musical ','in Spanish',
                    'in space ','in a Galaxy Far Far Away...','as seen in TV ','owned by Disney '];
        $learningStyles = ['auditive', 'visual', 'kinesthetic'];

        $randomImg = new RandomImage();
        $title = $this->faker->randomElement($hw).$this->faker->randomElement($subject).$this->faker->randomElement($secSbj);

        return [
            'title' => $title,
            'learningStyle' => $this->faker->randomElement($learningStyles),
            'categories' => implode(', ', $this->faker->randomElements($subject, random_int(1, count($subject)))),
            'summary' => $this->faker->paragraph(),
            'author_id' => User::all()->random()->getId(),
            'price' => $this->faker->numberBetween($min = 200, $max = 9000),
            'image' => $randomImg->genImage('jdenticon', $title),
        ];
    }
}
