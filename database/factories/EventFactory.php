<?php

namespace Database\Factories;

use App\Models\Club;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_event' => $this->faker->word,
            'description' => $this->faker->paragraph(1),
            'event_date' => now(),
            'place' => $this->faker->text,
            'event_type' =>$this->faker->randomElement(['conférance','jeux', 'competition', 'congrès']),
            'id_club' => Club::all()->random()->id
        ];
    }
}
