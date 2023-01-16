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
        Schema::create('voting_details_', function (Blueprint $table) {
            $table->string('member_id','17');
            $table->year('year');
            $table->string('vote_no',10);
            $table->primary(array('member_id','year'));
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
        Schema::dropIfExists('voting_details_');
    }
};