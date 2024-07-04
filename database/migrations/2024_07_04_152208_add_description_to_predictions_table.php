<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToPredictionsTable extends Migration
{
    public function up()
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->string('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}