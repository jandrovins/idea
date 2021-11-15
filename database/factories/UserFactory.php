<?php

//Edited by: Simón Flórez Silva

namespace Database\Factories;

use App\Models\User;
use App\Util\RandomImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $learningStyles = ['auditive', 'visual', 'kinesthetic'];
        $randomImg = new RandomImage();
        $name = $this->faker->name;

        return [
            'name' => $name,
            'email' => $this->faker->unique()->email,
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(32)),
            'remember_token' => uniqid(),
            'image' => $randomImg->genImage('human', $name),
            'dateOfBirth' => $this->faker->dateTimeInInterval($startDate = '-50 years', $interval = '50 years', $timezone = null),
            'learningStyle' => $this->faker->randomElement($learningStyles),
            'phoneNumber' => $this->faker->phoneNumber,
        ];
    }
}
