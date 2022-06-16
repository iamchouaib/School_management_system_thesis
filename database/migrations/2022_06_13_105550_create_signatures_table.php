<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignaturesTable extends Migration
{
    public function up()
    {
        Schema::create('signatures', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->String('signature');


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('signatures');
    }
}
