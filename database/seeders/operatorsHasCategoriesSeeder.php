<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Operator;
use App\Models\OperatorHasCategories;
use Database\Factories\operatorsHasCategoriesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class operatorsHasCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =  Category::all();
        $operators = Operator::all();

        foreach ($categories as $category){
            foreach ($operators as $operator){
                OperatorHasCategories::firstOrCreate([
                    'category_id' => $category->id,
                    'operator_id' => $operator->id,
                ]);
            }
        }
    }
}
