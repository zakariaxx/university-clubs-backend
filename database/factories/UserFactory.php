<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
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
        return [
        'phone_number' => $this->faker->phoneNumber,
        'user_name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'password' => $password = bcrypt("pass"),
        'remember_token' => Str::random(10),
        'verified' => $verified = $this->faker->randomElement([User::UNVERIFIED_USER, User::VERIFIED_USER]),
        'email_verified_at' => $verified == User::UNVERIFIED_USER ? null:now(),
        'verification_token'=> $verified == User::VERIFIED_USER ? null: User::generateVericationCode(),
        'admin' => $this->faker->randomElement([User::ADMIN_USER, User::REGULAR_USER]),
        'activate' => $this->faker->randomElement([User::ACTIVATE_USER, User::DESACTIVATE_USER]),
        'sexe' => $this->faker->randomElement(["M","F"])
        ];
    }
}
