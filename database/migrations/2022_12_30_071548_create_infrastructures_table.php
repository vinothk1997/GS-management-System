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
        Schema::create('infrastructures', function (Blueprint $table) {
            $table->string('family_id','12')->primary();
            $table->string('type_of_residence','30');
            $table->string('type_of_house','50');
            $table->string('roof','50');
            $table->string('lightning',3);
            $table->string('water_facility',3);
            $table->string('sanitary_facility',3);
            $table->foreign('family_id')
            ->references('family_id')
            ->on('family_heads')
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
        Schema::dropIfExists('infrastructures');
    }
};