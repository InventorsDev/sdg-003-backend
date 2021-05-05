<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Categories = collect([
            
            //Fruits
            ['https://images.pexels.com/photos/693794/pexels-photo-693794.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940','Apple', 100.00, 30,1],
            ['https://image.winudf.com/v2/image/Y29tLk1hbmdvd2FsbHBhcGVycy5waWN0dXJlcy5iYWNrZ3JvdW5kcy5waG90b3MuaW1hZ2VzLmhkLmZyZWUuYmVhdXRpZnVsX3NjcmVlbl8yXzE1MzYyMDA0NDRfMDQx/screen-2.jpg?fakeurl=1&type=.jpg','Mangoes', 80.00, 30,1],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9X6eqYeCfheVZqxh4Ag94qkwS-vJ5DuY3AQ&usqp=CAU','Bannana', 300.00, 30,1],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTGD8DT6zNYo8gu3fs9F5Rv75KtEizUFilCA&usqp=CAU','Pine-apple', 300.00, 30,1],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBtuB_Qn4_c9Zzzw8g7zv69k4Gri39Cf94jw&usqp=CAU','Watermelon', 500.00, 30,1],

            //Vegetables
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-NGKzkmygCtL_eJWMCfUGLuWiaCvC0vh97w&usqp=CAU','Carrot', 100.00, 50,2],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThno9fAqpzka19Sbltv5VjyX_WYIjLgbYa1A&usqp=CAU','Tomatoes(Full Basket)', 30000.00, 50,2],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvy6MsUnWQPxIMzsKWk_hX4ubpfHBAv-nFnA&usqp=CAU','Fresh Pepper(Full Basket)', 20000.00, 50,2],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpIdBcrFmp4jJxBncxEAXldo9OxRvEFiJ_XA&usqp=CAU','Onion(Full Basket)', 10000.00, 50,2],

            //Beans
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgoR-LEhcrYDVFxx6HbD9sjhJY6vKBKCk2nQ&usqp=CAU','Honey Beans(1kg)', 14000.00, 30,3],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_d-Ucb4x31zsdM1QMA_kNv_qXhwuKxy0RAw&usqp=CAU','White Beans', 14000.00, 30,3],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCKp4mixGx_Wd1cGUZMgn5YPaOd1KRq8QpwQ&usqp=CAU','25kg Honey Beans', 19250.00, 30,3],
            

            //Rice
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0zmAiwKZfBisWUlvACZ38jrSgSAxcxm8d2L0uoZoKWLX2tyuKPVclDSeKrBXORwkVl2A&usqp=CAU','25kg Mamas Pride', 14000.00, 30,4],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROrXh964IrY-evatHRNu57LDhtibx_BN3ClA&usqp=CAU','50kg Cap Rice', 15000.00, 30,4],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJPkXSmlbW-V0P0VpB9vrS9uzzaHn-VMMLBg&usqp=CAU','Basmati Rice', 10000.00, 30,4],

            //Groundnut Oil
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQyqTDrj-z-zSOPPavARdib2ytUfy8TpzxPg&usqp=CAU','5 litres Kings Groundnut Oil', 5000.00, 30,5],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCXxNAOTBr6MyCj8zOZCOtJ_5jIglVP4IVaw&usqp=CAU','5 litres Kings Groundnut Oil', 3000.00, 30,5],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7_lPMi7YcNECfYIeftN7-H4rgkVv18a-TFw&usqp=CAU','25kg Mamas Pride', 5050.00, 30,5],

            //Noodles and Spaghetti
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdJYgp13K6bNY5fpC9jEbM0lO-YFc5tlnZ2w&usqp=CAU','Indomitables(Carton)', 2500.00, 30,6],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8YnYjpqU7rVhkUVc9jgS1Qu_fZX2g_ptUhA&usqp=CAU','Golden Penny Spaghetti(Cartoon)', 4500.00, 30,6]

            ])->map(function ($name){
                return Product::create(['url'=>$name[0],'product_name'=>$name[1],'unit_price'=>$name[2],'quantity'=>$name[3],'category_id'=>$name[4]]);
            });
    }
}
