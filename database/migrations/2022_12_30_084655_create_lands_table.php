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
        Schema::create('lands', function (Blueprint $table) {
            $table->string('land_id','10')->primary();
            $table->string('member_id','17');
            $table->string('family_id','17');
            $table->string('land_type','20');
            $table->string('land_gn_id','5');
            $table->mediumText('address');
            $table->integer('area');
            $table->string('reg_no','100');
            $table->string('document_file','15');
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
        Schema::dropIfExists('lands');
    }
};