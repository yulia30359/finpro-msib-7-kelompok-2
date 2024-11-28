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
        Schema::create('light_activity_reminders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('activity_type');
            $table->integer('frequency_in_hours');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('light_activity_reminders');
    }
};
