<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $categories = [
           [
               'name'=>'Networking'
           ],
           [
               'name'=>'Hardware'
           ],
           [
               'name'=>'Software'
           ]
       ];
        foreach ($categories as $key => $category) {
            Category::create($category);
        }
    }
}
