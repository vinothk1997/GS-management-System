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
        Schema::create('trees', function (Blueprint $table) {
            $table->string('land_id','10');
            $table->string('tree_name','10');
            $table->string('tree_type','20');
            $table->tinyInteger('no_of_tree');
            $table->primary(array('land_id','tree_name'));
            $table->foreign('land_id')->references('land_id')->on('lands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trees');
    }
};