<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTrafficsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_traffics', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->date('date');
            $table->string('company', 5);
            $table->string('gate', 20);
            $table->string('class', 5);
            $table->integer('traffic');
            $table->string('source', 20);
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
        Schema::dropIfExists('info_traffics');
    }
}
