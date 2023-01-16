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
        Schema::create('pensions_', function (Blueprint $table) {
            $table->string("pension_id",'10')->primary();
            $table->string("member_id",'17');
            $table->string("pension_no",'20');
            $table->string("bank",'100');
            $table->decimal("amount");
            $table->string("category",'50');
            $table->foreign('member_id')->references('member_id')->on('family_members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pensions_');
    }
};