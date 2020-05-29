<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPractitionerSpecialty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('practitioners', function (Blueprint $table) {
            // if not exist, add the new column
            if (!Schema::hasColumn('practitioners', 'specialty')) {
                $table->string('specialty')->nullable()->after('last_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('practitioners', 'specialty')) {
            Schema::table('practitioners', function (Blueprint $table) {
                $table->dropColumn('specialty');
            });
        }
    }
}
