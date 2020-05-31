<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $loremipsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
        
        DB::table('car_models')->insert([
            'name' => 'Duster',
            'brand' => 'Renault',
            'year' => '2020',
            'description' => $loremipsum,
            'image' => 'images/cars/duster.jpg',
            'type' => 'SUV',
            'base_price' => '50000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('car_models')->insert([
            'name' => '350z',
            'brand' => 'Nissan',
            'year' => '2004',
            'description' => $loremipsum,
            'image' => 'images/cars/350z.jpg',
            'type' => 'COUPE',
            'base_price' => '50000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('car_models')->insert([
            'name' => 'Cresta',
            'brand' => 'Toyota',
            'year' => '2004',
            'description' => $loremipsum,
            'image' => 'images/cars/cresta.jpg',
            'type' => 'COUPE',
            'base_price' => '50000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('car_models')->insert([
            'name' => 'Miata MX5',
            'brand' => 'Mazda',
            'year' => '1990',
            'description' => $loremipsum,
            'image' => 'images/cars/miata_mx5.jpeg',
            'type' => 'COUPE',
            'base_price' => '50000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('car_models')->insert([
            'name' => '3000GT',
            'brand' => 'Mitsubishi',
            'year' => '2005',
            'description' => $loremipsum,
            'image' => 'images/cars/3000GT.jpg',
            'type' => 'COUPE',
            'base_price' => '50000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('car_models')->insert([
            'name' => 'Lancer Evolution VIII',
            'brand' => 'Mitsubishi',
            'year' => '2005',
            'description' => $loremipsum,
            'image' => 'images/cars/lancer_evolution_viii.jpg',
            'type' => 'COUPE',
            'created_at' => now(),
            'base_price' => '50000',
            'updated_at' => now()
        ]);
		DB::table('car_models')->insert([
			'name' => 'Audi R8 Coupé V10 Plus',
			'brand' => 'Audi',
			'year' => '2018',
			'description' => $loremipsum,
			'image' => 'images/cars/audi_r8.jpg',
            'type' => 'COUPE',
            'base_price' => '50000',
			'created_at' => now(),
			'updated_at' => now()
		 ]);
		 DB::table('car_models')->insert([
			'name' => 'Jaguar F-TYPE SVR Coupe',
			'brand' => 'Jaguar',
			'year' => '2019',
			'description' => $loremipsum,
			'image' => 'images/cars/jaguar.jpg',
            'type' => 'COUPE',
            'base_price' => '50000',
			'created_at' => now(),
			'updated_at' => now()
		 ]);
		 DB::table('car_models')->insert([
			'name' => 'Porsche 911 Carrera 4S',
			'brand' => 'Porsche',
			'year' => '2019',
			'description' => $loremipsum,
			'image' => 'images/cars/porsche.jpg',
            'type' => 'COUPE',
            'base_price' => '50000',
			'created_at' => now(),
			'updated_at' => now()
		 ]);
    }
}
