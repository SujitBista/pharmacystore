<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Customer;
class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create();
    	foreach(range(1,mt_rand(5,15)) as $index){
        	Customer::create([
        		'name' => $faker->name,
                'email' => $faker->unique()->email,
                'phone' => $faker->phoneNumber,
                'address1' => $faker->address,
                'address2' => $faker->address,

        	]);
    	}
    }
}
