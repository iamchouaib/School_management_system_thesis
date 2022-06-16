<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncesTable extends Migration
{
    public function up()
    {
        Schema::create('announces', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->string('title');
            $table->text('content');
            $table->string('photo')->nullable();
            $table->boolean('published')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('announces');
    }
}
