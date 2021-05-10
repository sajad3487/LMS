<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('mentor_id');
            $table->integer('parent_id')->default(0);
            $table->integer('user_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('company')->nullable();
            $table->string('target')->nullable();
            $table->date('start')->nullable();
            $table->date('deadline')->nullable();
            $table->integer('status')->default(1);

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
        Schema::dropIfExists('evaluations');
    }
}
