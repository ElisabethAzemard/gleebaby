<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaretakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caretakers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('first_name', 20);
            $table->char('last_name', 20);
            $table->char('email')->unique();
            $table->char('password')->unique();
            $table->tinyInteger('age')->nullable();

            // Foreign keys
            $table->integer('sponsor_id')->nullable();
            $table->integer('family_id')->nullable();
            $table->integer('caretakerform_id')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('caretakers');
    }
}
