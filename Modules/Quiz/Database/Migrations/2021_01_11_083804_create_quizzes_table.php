<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('parent_id')->default(0);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('first_name_label')->nullable();
            $table->boolean('first_name_requirement')->default(1);
            $table->string('last_name_label')->nullable();
            $table->boolean('last_name_requirement')->default(1);
            $table->string('email_label')->nullable();
            $table->boolean('email_requirement')->default(1);
            $table->string('first_info_label')->nullable();
            $table->boolean('first_info_status')->default(0);
            $table->string('second_info_label')->nullable();
            $table->boolean('second_info_status')->default(0);
            $table->string('third_info_label')->nullable();
            $table->boolean('third_info_status')->default(0);
            $table->string('date_info_label')->nullable();
            $table->boolean('date_info_status')->default(0);
            $table->boolean('placeholder')->default(1);
            $table->integer('status')->default(1);
            $table->integer('taken')->default(0);
            $table->integer('average_score')->default(0);
            $table->integer('average_percentage')->default(0);
            $table->string('button_text')->nullable();
            $table->string('type')->default('quiz');
            $table->string('intro_video')->nullable();
            $table->string('banner')->nullable();
            $table->string('result_banner')->nullable();

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
        Schema::dropIfExists('quizzes');
    }
}
