<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id'); // Aggiungi la colonna come nullable
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Imposta il vincolo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Rimuovi il vincolo di chiave esterna
            $table->dropColumn('user_id'); // Rimuovi la colonna user_id
        });
    }
}
