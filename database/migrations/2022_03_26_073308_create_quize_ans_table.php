<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizeAnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quize_ans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('q_id')->nullable();
            $table->string('option')->nullable();
            $table->tinyInteger('is_ans')->nullable();
            $table->timestamps();

            $table->foreign('q_id')->references('id')->on('quizes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quize_ans');
    }
}
