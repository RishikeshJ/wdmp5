<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\OrderItem;
use App\Product;
use App\ProductCategory;
use App\User;
use App\Rights;
use Faker\Generator as Faker;
use Faker\Provider\ar_JO\Address;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $rights = new Rights([]);
    $rights->save();
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'password', // password
        'remember_token' => Str::random(10),
        'age' => $faker->randomDigit,
        'image_url' => $faker->imageUrl(),
        'phone' => $faker->randomDigit,
        'address' => $faker->streetAddress,
        'state' => $faker->state,
        'role_id' => 2,
    ];
});



$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image_url' => $faker->imageUrl(),
        'description' => $faker->sentences(1, true),
        'long_description' => $faker->sentences(3, true),
        'available' => $faker->boolean(),
        'vegan' => $faker->boolean(),
        'label' => $faker->word(),
        'label_color' => $faker->hexcolor,
        'price' => number_format($faker->randomFloat(NULL, 0, 5.99), 2),
    ];
});

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Burger', 'Shake', 'Salad', 'Soda', 'Combo']).'_'.$faker->randomDigit,
        'image_url' => $faker->imageUrl(),
        // 'description' => $faker->sentences(1, true),
        'short_description' => $faker->sentences(3, true),
        'available' => $faker->boolean(),
        'displayed' => $faker->boolean(),
        'label' => $faker->word(),
        'label_color' => $faker->hexcolor,
    ];
});

$factory->define(Order::class, function (Faker $faker) {
    $user = User::inRandomOrder()->get()->first();

    // $price = $faker->randomFloat(NULL, 0, 1.99);
    $discount = $faker->randomFloat(NULL, 0, 1.99);
    // $tax = 0.08 * ($price - $discount);
    // $final_price = $price + $tax - $discount;
    $pick_up = $faker->boolean();
    $delivery = !$pick_up;
    $address = "in-store";

    if($pick_up){
        $address = $user->address;
    }


    
    return [
        // 'price' => number_format($price, 2),
        // 'tax' => number_format($tax, 2),
        'discount' => number_format($discount, 2),
        // 'final_price' => number_format($final_price, 2),
        'pickup' => $pick_up,
        'delivery' => $delivery,
        'address' => $address,
        'fulfilled' => $faker->boolean(),
    ];
});


$factory->define(OrderItem::class, function (Faker $faker) {
    return [
        'quantity' => $faker->randomDigit,
        'instructions' => $faker->word(),
    ];
});
