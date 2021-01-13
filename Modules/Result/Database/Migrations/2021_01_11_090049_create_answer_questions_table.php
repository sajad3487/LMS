<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('form_id');
            $table->integer('result_id');
            $table->integer('question_id');
            $table->integer('option_id');
            $table->string('type');
            $table->string('answer');
            $table->string('additional_info')->nullable();
            $table->integer('score');

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
        Schema::dropIfExists('answer_questions');
    }
}
