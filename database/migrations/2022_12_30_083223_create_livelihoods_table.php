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
        Schema::create('livelihoods', function (Blueprint $table) {
            $table->string('livelihood_id','10')->primary();
            $table->string('family_id','12');
            $table->date('start_date');
            $table->decimal('amount');
            $table->string('assist_type_id','5');
            $table->foreign('family_id')->references('family_id')->on('family_heads');
            $table->foreign('assist_type_id')->references('assist_type_id')->on('assist_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livelihoods');
    }
};