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
        Schema::create('gn_divisions', function (Blueprint $table) {
            $table->string('gn_id','5')->primary();
            $table->string('name','100');
            $table->string('code','10');
            $table->string('division_id','5');
            $table->foreign('division_id')
            ->references('division_id')
            ->on('divisions')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gn_divisions');
    }
};