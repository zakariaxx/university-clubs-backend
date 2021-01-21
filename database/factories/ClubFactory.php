<?php

namespace Database\Factories;

use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClubFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Club::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $password;
        return [
            'club_name' => $this->faker->unique()->Word,
            'mission_objectives' => $this->faker->paragraph(1),
            'description' => $this->faker->paragraph(2),
            'email' => $this->faker->email,
            'creation_date' => now(),
            'club_type' => $this->faker->text,
            'club_logo'=>$this->faker->randomElement(['c1.png','c4.png','c5.png','c3.png','c2.png'])
        ];
    }
}
