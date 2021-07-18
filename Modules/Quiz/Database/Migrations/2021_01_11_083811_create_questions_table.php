<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('form_id');
            $table->integer('parent_id')->default(0);
            $table->integer('position');
            $table->string('type')->default('question');
            $table->string('body');
            $table->text('description')->nullable();
            $table->integer('additional_info')->default(0);
            $table->integer('status')->default(1);
            $table->boolean('requirement')->default(1);
            $table->string('media')->nullable();

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
        Schema::dropIfExists('questions');
    }
}
