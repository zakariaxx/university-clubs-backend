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
        $club=Club::all()->random();

        return [
            'theme' => $this->faker->word(),
            'name_event' => $this->faker->word,
            'description' => $this->faker->paragraph(2),
            'event_date' => now(),
            'location' => $this->faker->text,
            'id_club' => $club->id,
            'club_name' => $club->club_name
        ];
    }
}
