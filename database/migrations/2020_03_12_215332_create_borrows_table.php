<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->string("user");
            $table->string("car");
            $table->date("start_date");
            $table->date("end_date");
            $table->enum("status", ["ACTIVE", "FINISHED", "OVERDUE"]);
            $table->foreign("user")->references("username")->on("users")
                  ->onDelete("cascade");
            $table->foreign("car")->references("number_plate")->on("cars")
                  ->onDelete("cascade");
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
        Schema::dropIfExists('borrows');
    }
}
