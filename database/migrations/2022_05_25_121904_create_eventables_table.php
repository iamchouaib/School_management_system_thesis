<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('eventables', function (Blueprint $table) {

            $table->integer('event_id');
            $table->integer('eventable_id');
            $table->string('eventable_type');
            $table->timestamps();

        });
    }


    public function down()
    {
        Schema::dropIfExists('eventables');
    }
};
