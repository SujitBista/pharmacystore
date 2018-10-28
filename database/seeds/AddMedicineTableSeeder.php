<?php

use Illuminate\Database\Seeder;
use App\AddMedicine;
use Faker\Factory;
use App\Distributor;
class AddMedicineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create();
    	$distributor = Distributor::pluck('id')->all();
    	foreach(range(1,mt_rand(5,15)) as $index){
        	AddMedicine::create([
        		'code' => $faker->swiftBicNumber,
        		'distributor_id' => $faker->randomElement($distributor),
        		'type' => $faker->randomElement(['syrup','lotion','injection','powder','cream','Eye Drop','Tablet','capsule']),
        		'pack' => $faker->randomElement(['strip','ointment','ML']),
        		'name' => $faker->name,
        		'itemdescription' => $faker->sentence,
        		'qty' => $faker->randomElement([rand(1,50)]),
        		'rate' => $faker->randomElement([rand(1,500)]),
        		'expdate' => $faker->date(),
        		'batchnumber' => $faker->unique()->randomDigit,
        		'mrp' => $faker->randomDigit,


        	]);
    	}
    }
}
