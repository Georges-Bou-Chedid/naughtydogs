<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrideworsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tridewors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('history_id')
            ->references('id')
            ->on('histories')
            ->onDelete('cascade');
            $table->string('type')->nullable();
            $table->string('Brand')->nullable();
            $table->date('Date')->nullable();
            $table->integer('Weight')->nullable();
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
        Schema::dropIfExists('tridewors');
    }
}
