<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(FAKER $faker)
    {
        for( $i=0; $i<10; $i++){ 
            DB::table('products')->insert([
                'slug'=>Str::random(10),
                'name_product' => $faker->name,
                'image' =>'public/wJVVdQ9scRwVgSedBr0EKQM4haY0utbiCQPsWwHh.jpeg',
                'price' =>$faker->numberBetween($min=200000,$max=1000000),
                'old_price'=>$faker->numberBetween($min=200000,$max=1000000),
                'discount'=>$faker->numberBetween($min=1,$max=100),
                'quantity'=>$faker->numberBetween($min=1,$max=50),
                'category_id'=>$faker->numberBetween($min=1,$max=6),
                'company_id'=>$faker->numberBetween($min=1,$max=6),
                'date_create'=>$faker->date($format = 'Y-m-d', $max = 'now')
            ]);
            }
    }
}