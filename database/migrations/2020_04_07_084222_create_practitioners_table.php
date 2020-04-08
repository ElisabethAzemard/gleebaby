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
            $table->char('password', 20);
            $table->timestamp('email_verified_at')->nullable();

            // Foreign keys
            $table->integer('practitionerform_id');

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
