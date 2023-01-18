<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Operator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class operatorsHasCategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "category_id"=>Category::inRandomOrder()->first()->id,
            "operator_id"=>Operator::inRandomOrder()->first()->id,
        ];
    }
}
