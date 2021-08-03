<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('posts', function (Blueprint $table) {


            $table->id();
            $table->string('title');
            $table->mediumText('content');
            $table->string('image')->nullable();
            $table->foreignId('user_id')
                //관례를 따르면 , users table 에 id 칼럼을 참고하구나! 알아서 알아듣는다.
                ->constrained()
                ->onDelete('cascade');
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
        Schema::dropIfExists('_posts');
    }
}
