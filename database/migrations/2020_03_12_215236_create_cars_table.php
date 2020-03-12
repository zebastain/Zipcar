<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId("model");
            $table->enum("availability", ["AVAILABLE", "UNAVALIABLE"]);
            $table->enum("status", ["GOOD", "MEDIUM", "BAD"]);
            $table->decimal("mileage");
            $table->timestamps();
            $table->foreign("model")->references("id")->on("car_models")
                  ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
