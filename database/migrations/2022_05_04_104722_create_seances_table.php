<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration
{
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->constrained()->cascadeOnDelete();
            $table->integer('nb_week');
            $table->boolean('isDone')->default(0);
            $table->date('seance_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seances');
    }
}
