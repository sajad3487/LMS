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
            $table->string('title')->nullable();
            $table->string('first_name_label')->nullable();
            $table->boolean('first_name_requirement')->default(1);
            $table->string('last_name_label')->nullable();
            $table->boolean('last_name_requirement')->default(1);
            $table->string('email_label')->nullable();
            $table->boolean('email_requirement')->default(1);
            $table->boolean('placeholder')->default(1);
            $table->integer('status')->default(1);
            $table->integer('taken')->default(0);
            $table->integer('average_score')->default(0);
            $table->integer('average_percentage')->default(0);

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
