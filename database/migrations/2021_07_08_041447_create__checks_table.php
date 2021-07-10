<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mychecks', function (Blueprint $table) {
            $table->increments('checkId');
            //자동증가 글의번호
            $table->timestamps();

            $table->foreignId('user_id')
                //관례를 따르면 , users table 에 id 칼럼을 참고하구나! 알아서 알아듣는다.
                ->constrained()
                ->onDelete('cascade');

            $table->string('checklistInfo', 300);
            //체크리스트 내용


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_checks');
    }
}
