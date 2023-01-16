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
            $table->string('member_id','17');
            $table->string('type','100');
            $table->date('date');
            $table->longText('reason');
            $table->decimal('monthly_assist');
            $table->decimal('amount');
            $table->primary(array('member_id','type'));
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
        Schema::dropIfExists('differently_abled_people');
    }
};