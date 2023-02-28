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
        Schema::create('deaths', function (Blueprint $table) {
            $table->increments('death_id');
            $table->string('member_id',17)->nullable();
            $table->string('family_id',12)->nullable();
            $table->date('death_date');
            $table->string('place',200);
            $table->longText('reason');
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
        Schema::dropIfExists('deaths_');
    }
};