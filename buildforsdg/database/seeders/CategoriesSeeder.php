<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Categories = collect([
            
           'Fruits',
           'Vegetables',
           'Beans',
           'Rice',
           'Groudnut Oil',
           'Noodles and Spaghetti'
            

            ])->map(function ($name){
                return Category::create(['category_name'=>$name]);
            });
    }
}
