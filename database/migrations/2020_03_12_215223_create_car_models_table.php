<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("brand");
            $table->integer("year");
            $table->longtext("description");
            $table->string("image");
            $table->enum("type", ["SEDAN", "SUV", "VAN", "MINIVAN", 
                                  "CUV", "HATCHBACK", "COUPE"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_models');
    }
}
