<?php

namespace Jclavo\Profiles\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Jclavo\Profiles\Models\Profile;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "profile_{$this->faker->randomNumber}_" . time(),
            'description' => $this->faker->text,
            'activated' => true,
            'fixed' => false
        ];
    }
}
