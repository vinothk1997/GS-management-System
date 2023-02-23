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
        Schema::create('family_heads', function (Blueprint $table) {
            $table->string('family_id',12)->primary();
            $table->string('first_name','100');
            $table->string('last_name','100');
            $table->string('nic','12');
            $table->date('dob');
            $table->string('gender','6');
            $table->integer('mobile');
            $table->mediumText('permanent_address');
            $table->mediumText('temporary_address');
            $table->string('house_no','10');
            $table->string('card_type','2');
            $table->string('internet','20');
            $table->string('married_certificate_no','20');
            $table->string('gn_id','5');
            $table->string('religion_id','4');
            $table->string('ethnic_id','4');
            $table->string('occupation_id','5');
            $table->foreign('gn_id')
            ->references('gn_id')
            ->on('gn_divisions');
            $table->foreign('religion_id')
            ->references('religion_id')
            ->on('religions');
            $table->foreign('ethnic_id')
            ->references('ethnic_id')
            ->on('ethnics');
            $table->foreign('occupation_id')
            ->references('occupation_id')
            ->on('occupations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('family_heads');
    }
};