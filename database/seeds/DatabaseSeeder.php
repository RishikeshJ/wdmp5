<?php

use App\CustomerQuery;
use App\User;
use App\Product;
use App\Order;
use App\OrderItem;
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
        factory(CustomerQuery::class, 10)->create(['type'=>'0']);
        factory(CustomerQuery::class, 10)->create(['type'=>'1']);
        factory(CustomerQuery::class, 10)->create(['type'=>'2']);
        // factory(Order::class, 50);
        
        factory(ProductCategory::class, 5)->create()->each(function($category){
            for ($i=0; $i < 10; $i++) {
                $category->get_products()->save(factory(Product::class)->make([
                    'name' => $category->name.'-'.$i,
                ]));
            }
        // factory(Product::class, 50)->create()->each(function($product, $category){
            //     $product->get_category()->save($category);
            // });
        });

        for ($i=0; $i < 50; $i++) { 
            $user = User::inRandomOrder()->get()->first();
            
            factory(Order::class, 1)->create([
                'user' => $user->id,
                'address' => $user->address,
            ]);
            
            $order = Order::doesntHave('order_items')->inRandomOrder()->first();
            for ($j=0; $j < rand(1,5); $j++) { 
                $product = Product::inRandomOrder()->first();

                factory(OrderItem::class, 1)->create([
                    'product' => $product->id,
                    'price' => $product->price,
                    'order' => $order->id,
                ]);
            }

            $order->updatePrice();
        }
        
        
        // $orders = Order::all();
        // foreach($orders as $item){
        //     $item->updatePrice();
        // }
        
    }
}
