<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $this->call(UserTableSeeder::class);
        $this->call(DistributorTableSeeder::class);
        $this->call(AddMedicineTableSeeder::class);
        $this->call(CustomerTableSeeder::class);

     }
}
