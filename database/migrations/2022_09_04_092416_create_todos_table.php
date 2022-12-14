<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        

        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->string('title',100);
            $table->timestamp('updated_at')->useCurrent()->nullable();
            $table->integer('user_id');
            $table->integer('tag_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
