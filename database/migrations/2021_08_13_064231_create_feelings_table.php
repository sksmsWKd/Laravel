<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeelingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feelings', function (Blueprint $table) {




            $table->id();
            $table->timestamps();



            $table->foreignId('post_id')->constrained()->onDelete('cascade');

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();
            $table->integer('check');

            $table->unique(['user_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feelings');
    }
}
