<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0);
            $table->integer('evaluation_id');
            $table->integer('circle_id');
            $table->integer('not_id')->nullable();
            $table->integer('user_id');
            $table->string('body')->nullable();
            $table->string('type')->default('text_answer');

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
        Schema::dropIfExists('answer_evaluations');
    }
}
