<?php

use App\User;
use App\Product;
use App\Order;
use App\ProductCategory;
use App\Rights;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {   
        // $this->call(UserSeeder::class);
        factory(User::class, 10)->create();
        // factory(Order::class, 50);
        factory(ProductCategory::class, 5)->create()->each(function($category){
            $category->get_products()->save(factory(Product::class)->make([
                'name' => $category->name.'-1',
                ]));
            // factory(Product::class, 50)->create()->each(function($product, $category){
            //     $product->get_category()->save($category);
            // });
        });
    }
}
