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
        Schema::create('voting_details', function (Blueprint $table) {
            $table->increments('Voting_id');
            $table->year('year');
            $table->string('vote_no',10);
            $table->string('member_id','17')->nullable();
            $table->string('family_id','12')->nullable();
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
        Schema::dropIfExists('voting_details_');
    }
};