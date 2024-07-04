<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathToMedicalRecordsTable extends Migration
{
    public function up()
    {
        Schema::table('medical_records', function (Blueprint $table) {
            $table->string('image_path')->nullable();
        });
    }

    public function down()
    {
        Schema::table('medical_records', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
}