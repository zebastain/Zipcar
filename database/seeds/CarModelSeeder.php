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
            'image' => 'img/cars/duster.jpg',
            'type' => 'SUV',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('car_models')->insert([
            'name' => '350z',
            'brand' => 'Nissan',
            'year' => '2004',
            'description' => $loremipsum,
            'image' => 'img/cars/350z.jpg',
            'type' => 'COUPE',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('car_models')->insert([
            'name' => 'Cresta',
            'brand' => 'Toyota',
            'year' => '2004',
            'description' => $loremipsum,
            'image' => 'img/cars/cresta.jpg',
            'type' => 'COUPE',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('car_models')->insert([
            'name' => 'Miata MX5',
            'brand' => 'Mazda',
            'year' => '1990',
            'description' => $loremipsum,
            'image' => 'img/cars/miata_mx5.jpeg',
            'type' => 'COUPE',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('car_models')->insert([
            'name' => '3000GT',
            'brand' => 'Mitsubishi',
            'year' => '2005',
            'description' => $loremipsum,
            'image' => 'img/cars/3000GT.jpg',
            'type' => 'COUPE',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('car_models')->insert([
            'name' => 'Lancer Evolution VIII',
            'brand' => 'Mitsubishi',
            'year' => '2005',
            'description' => $loremipsum,
            'image' => 'img/cars/lancer_evolution_viii.jpg',
            'type' => 'COUPE',
            'created_at' => now(),
            'updated_at' => now()
        ]);
		DB::table('car_models')->insert([
			'name' => 'Dragon Airforce GTX ULTRA XTREME 9000',
			'brand' => 'Dragon Airforce SA',
			'year' => '2019',
			'description' => $loremipsum,
			'image' => 'img/cars/dragon_airforce.jpg',
			'type' => 'HÍBRIDO DE ALTO CILINDRAJE',
			'created_at' => now(),
			'updated_at' => now()
		 ]);
		 DB::table('car_models')->insert([
			'name' => 'Jetix Stream ultra attack specialized carbonated flow',
			'brand' => 'Silver Fang incorporated',
			'year' => '2008',
			'description' => $loremipsum,
			'image' => 'img/cars/jetix_stream.jpg',
			'type' => 'TODO TERRENO',
			'created_at' => now(),
			'updated_at' => now()
		 ]);
		 DB::table('car_models')->insert([
			'name' => 'Coupre Nissan ultra smart special promo + cute model',
			'brand' => 'Trump inc.',
			'year' => '2015',
			'description' => $loremipsum,
			'image' => 'img/cars/special_promo.jpg',
			'type' => 'UNNECESSARY',
			'created_at' => now(),
			'updated_at' => now()
		 ]);
    }
}
