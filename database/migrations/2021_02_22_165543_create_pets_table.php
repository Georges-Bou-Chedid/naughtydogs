<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('history_id')
            ->references('id')
            ->on('histories')
            ->onDelete('cascade');

            $table->string('species')->nullable();
            $table->string('PetName')->nullable();
            $table->string('Breed')->nullable();
            $table->string('Gender')->nullable();
            $table->string('Color')->nullable();
            $table->Date('DOB')->nullable();
            $table->string('Spayed')->nullable();
            $table->string('Environment')->nullable();
            $table->string('Exercise')->nullable();
            $table->string('Travel')->nullable();
            $table->string('VaccinationBook')->nullable();
            $table->string('Microship')->nullable();
            $table->string('Food')->nullable();
            $table->string('Brand')->nullable();
            $table->integer('Qty')->nullable();
            $table->integer('Weight')->nullable();
            $table->string('Pregnency')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
