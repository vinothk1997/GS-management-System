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
        Schema::create('staff', function (Blueprint $table) {
            $table->string('staff_id','5')->primary();
            $table->string('first_name','100');
            $table->string('last_name','100');
            $table->string('nic','12');
            $table->date('dob');
            $table->string('gender',6);
            $table->integer('mobile');
            $table->mediumText('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
};