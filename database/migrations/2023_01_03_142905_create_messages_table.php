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
        Schema::create('messages', function (Blueprint $table) {
            $table->string('message_id','10')->primary();
            $table->string('from_id','12');
            $table->string('to_id','12');
            $table->string('subject','100')->nullable();
            $table->longText('message')->nullable();
            $table->date('date');
            $table->time('time');
            $table->boolean('inbox_deleted')->nullable();
            $table->boolean('sent_deleted')->nullable();
            $table->boolean('read_status')->nullable();
            $table->string('family_id','12')->nullable();
            $table->string('staff_id','5')->nullable();
            $table->foreign('family_id')->references('family_id')->on("family_heads");
            $table->foreign('staff_id')->references('staff_id')->on("staff");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};