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
        Schema::create('animals', function (Blueprint $table) {
            $table->string('family_id',12);
            $table->string('type_of_animal');
            $table->tinyInteger('no_of_animal');
            $table->primary(array('family_id','type_of_animal'));
            $table->foreign('family_id')
            ->references('family_id')
            ->on('family_heads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
};