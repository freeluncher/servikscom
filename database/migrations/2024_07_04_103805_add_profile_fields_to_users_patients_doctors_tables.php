<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsersPatientsDoctorsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik', 16)->nullable()->change();
            $table->date('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
        });

        Schema::table('patients', function (Blueprint $table) {
            $table->date('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
        });

        Schema::table('doctors', function (Blueprint $table) {
            $table->date('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birth_date');
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });

        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('birth_date');
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });

        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('birth_date');
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });
    }
}
