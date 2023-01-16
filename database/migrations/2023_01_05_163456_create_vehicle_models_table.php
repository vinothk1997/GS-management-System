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
        Schema::create('vehicle_models', function (Blueprint $table) {
            $table->string('model_id','6')->primary();
            $table->string('brand_id','10');
            $table->string('vehicle_type_id','5');
            $table->string('name');
            $table->string('family_id','12');
            $table->string('member_id','17');
            $table->foreign('brand_id')->references('brand_id')->on('vehicle_brands');
            $table->foreign('vehicle_type_id')->references('vehicle_type_id')->on('vehicle_types');
            $table->foreign('family_id')->references('family_id')->on('family_heads');
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
        Schema::dropIfExists('vehicle_models');
    }
};