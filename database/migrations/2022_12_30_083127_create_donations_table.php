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
        Schema::create('donations', function (Blueprint $table) {
            $table->string('donation_id','6')->primary();
            $table->string('family_id','12');
            $table->date('date');
            $table->string('organization_id','5');
            $table->string('type','10');
            $table->decimal('amount');
            $table->longText('description');
            $table->foreign('family_id')->references('family_id')->on('family_heads');
            $table->foreign('organization_id')->references('organization_id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
};