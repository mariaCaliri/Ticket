<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Operator;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title"=>$this->faker->sentence(3, true),
            "message"=>$this->faker->sentence(5, true),
            "end_date"=>$this->faker->dateTime(),
            "priority"=>$this->faker->randomKey(['urgente'=>1, 'mediamente urgente'=>2, 'non urgente'=>3]),
            "status"=>$this->faker->randomKey(['completato' =>1, 'in lavorazione'=>2,'in attesa'=>3 ]),
            "feedback"=>$this->faker->paragraph(),
            "category_id"=>Category::inRandomOrder()->first()->id,
            "operator_id"=>Operator::inRandomOrder()->first()->id,
            "user_id"=>User::inRandomOrder()->first()->id
        ];
    }
}
