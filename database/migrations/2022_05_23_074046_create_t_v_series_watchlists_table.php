<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_v_series_watchlists', function (Blueprint $table) {
            $table->foreignId('UserId')->constrained('users');
            $table->foreignId('ItemId')->constrained('t_v_series');
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
        Schema::dropIfExists('t_v_series_watchlists');
    }
};
