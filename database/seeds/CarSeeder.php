<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = array('GOOD', 'MEDIUM', 'BAD');
        $models = App\CarModel::all();
        foreach ($models as $model) {
            for ($j = 1; $j<=10;$j++){
                DB::table('cars')->insert([
                    'number_plate' => strtoupper(Str::random(3)) . '-' . strtoupper(Str::random(3)),
                    'model' => $model->id,
                    'availability' => 'AVAILABLE',
                    'status' => $values[array_rand($values)],
                    'mileage' => rand(0, 1000),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }    
    }
}
