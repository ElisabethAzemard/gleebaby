<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePractitionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioners', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->char('first_name', 20);
            $table->char('last_name', 20);
            $table->char('email')->unique();
            $table->char('password')->unique();
            $table->timestamp('email_verified_at')->nullable();

            // Foreign keys
            $table->integer('practitionerform_id')->nullable();

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
        Schema::dropIfExists('practitioners');
    }
}
