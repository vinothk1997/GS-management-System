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
        Schema::create('family_members', function (Blueprint $table) {
            $table->string('member_id','17')->primary();
            $table->string('first_name','100');
            $table->string('last_name','100');
            $table->string('nic','12');
            $table->integer('mobile')->nullable();
            $table->date('dob');
            $table->string('gender','6');
            $table->string('family_id','12');
            $table->string('birth_certificate_no','20')->nullable();
            $table->string('relationship','20');
            $table->string('school')->nullable();
            $table->string('learning_place_type')->nullable();
            $table->decimal('monthly_income')->nullable();
            $table->string('driving_licence_no','20')->nullable();
            $table->string('occupation_id','5')->nullable();
            $table->string('education_id','5')->nullable();
            $table->foreign('occupation_id')->references('occupation_id')->on('occupations');
            $table->foreign('education_id')->references('education_id')->on('educations');
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
        Schema::dropIfExists('family_members');
    }
};