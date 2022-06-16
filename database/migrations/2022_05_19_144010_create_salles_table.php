<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSallesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('type_of_sale_id')->constrained();
            $table->boolean('reserved');
            $table->enum('salle_type' , ['td' , 'tp']);
            $table->integer('nbr_of_seats')->default(20);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
