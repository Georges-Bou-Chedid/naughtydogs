<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreviousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('history_id')
            ->references('id')
            ->on('histories')
            ->onDelete('cascade');
            $table->date('Date')->nullable();
            $table->string('Case')->nullable();
            $table->string('Procedure')->nullable();
            $table->string('Treatment')->nullable();
            $table->integer('Weight')->nullable();
            $table->string('Medications')->nullable();
            $table->string('Dosage')->nullable();
            $table->string('Frequency')->nullable();
            $table->string('Notes')->nullable();
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
        Schema::dropIfExists('previouses');
    }
}
