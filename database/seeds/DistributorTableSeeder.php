<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Distributor;

class DistributorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	$faker = Factory::create(); 
     	foreach(range(1,10) as $index){
     		Distributor::create([
     		 'name' => $faker->name,
     		 'phone' => $faker->phoneNumber
     		]);  
     	}
    }
}
