<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'family_name' => $this->faker->lastName,
            'middle_name' => $this->faker->firstNameMale,
            'date_of_birth' => $this->faker->date('Y-m-d H:i:s'),
            'date_of_death' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
