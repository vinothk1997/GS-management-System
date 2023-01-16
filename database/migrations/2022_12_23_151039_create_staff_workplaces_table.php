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
        Schema::create('staff_workplaces', function (Blueprint $table) {
            $table->string('staff_id','5');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('designation','15');
            $table->string('place_id','5');
            $table->primary(array('staff_id','start_date'));
            $table->foreign('staff_id')
            ->references('staff_id')
            ->on('staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_workplaces');
    }
};