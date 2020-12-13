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
            'description' => $this->faker->paragraph(1),
            'email' => $this->faker->email,
            'club_type' => $this->faker->text,
            'creation_date' => now(),
            'pedagogique_referent' => $this->faker->name,
            'fiche_signalitique' => $password?:$password = bcrypt("pass"),
        ];
    }
}
