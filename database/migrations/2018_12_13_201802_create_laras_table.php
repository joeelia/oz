<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('licensee_name');
            $table->string('record_number')->unique();
            $table->string('record_type');
            $table->string('address');
            $table->date('expiration_date');
            $table->boolean('status');
            $table->string('claimed')->default('0')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('laras');
    }
}
