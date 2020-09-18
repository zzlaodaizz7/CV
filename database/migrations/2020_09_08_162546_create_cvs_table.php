<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birthday');
            $table->string('email');
            $table->string('phone');
            $table->string('exp');
            $table->text('description');
            $table->string('salary');
            $table->string('source');
            $table->string('job');
            $table->string('cv');
            $table->datetime('timeinvite')->nullable();
            $table->string('status')->default('default');
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
        Schema::dropIfExists('cvs');
    }
}
