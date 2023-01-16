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
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id',12)->primary();
            $table->string('name');
            $table->string('password');
            $table->string('user_type');
            $table->string('attempt');
            $table->string('status');
            $table->string('verification_code');
            $table->string('staff_id','5');
            $table->string('family_id','12');
            $table->foreign('staff_id')->references('staff_id')->on('staff');
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
        Schema::dropIfExists('users');
    }
};