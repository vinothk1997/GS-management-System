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
        Schema::create('differently_abled_people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('member_id',17)->nullable();
            $table->string('family_id',12)->nullable();
            $table->string('type','100');
            $table->date('date');
            $table->longText('reason');
            $table->decimal('monthly_assist')->nullable();
            $table->decimal('amount')->nullable();
            $table->foreign('member_id')->references('member_id')->on('family_members');
            $table->foreign('family_id')->references('family_id')->on('family_heads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('differently_abled_people');
    }
};