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
        Schema::create('t_v_series', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->double('rating');
            $table->string('category');
            $table->string('imageUrl');
            $table->integer('releaseDate');
            $table->integer('seasons');
            $table->integer('episodes');
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
        Schema::dropIfExists('t_v_series');
    }
};
