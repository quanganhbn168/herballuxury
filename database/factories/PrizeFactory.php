<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prize>
 */
class PrizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->word();
        $code = $this->convertToCode($name);
        return [
            'name' => $name,
            'code' => $code,
            'probability' => $this->faker->numberBetween(10,40)
        ];
    }

    private function convertToCode($string)
    {
        $string = str_replace(' ', '', Str::ascii($string));
        $randomNumber = rand(100,999);
        return strtolower($string).$randomNumber;
    }
}   
