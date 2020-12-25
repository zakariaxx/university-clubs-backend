<?php

namespace Database\Factories;

use App\Models\Club;
use App\Models\Inscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inscription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => User::all()->random()->id,
            'id_club' => Club::all()->random()->id,
            'club_office_member' => $office_member = $this->faker-> randomElement([Inscription::NORMAL_MEMBER,Inscription::OFFICE_MEMBER ]),
            'post' => $office_member == Inscription::NORMAL_MEMBER ? null : $this->faker->randomElement(['Président',' Vice Président', 'Sécrétaire', 'Trésorié']),
            'inscription_date' => now(),
        ];
    }
}
