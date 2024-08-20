<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('stops', function (Blueprint $table) {
            $table->float('latitude')->after('location');
            $table->float('longitude')->after('latitude');
        });
    }

    public function down()
    {
        Schema::table('stops', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']);
        });
    }
};
