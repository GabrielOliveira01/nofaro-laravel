<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHashs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hashs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('input_string', 100);
            $table->string('key_found', 8);
            $table->string('generated_hash', 100);
            $table->integer('number_attempts');
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
        Schema::dropIfExists('hashs');
    }
}
