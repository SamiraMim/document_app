<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    
    public function definition()
    {
        return [
            'content' => $this->faker->text(),
            'priority' => $this->faker->numberBetween(1,5)
        ];
    }
}
