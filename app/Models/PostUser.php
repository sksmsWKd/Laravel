<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUser extends Model
{
    use HasFactory;

    protected $table = 'post_user';
    public $timestamps = false;
    //사용하는 테이블 지정

    public function post()
    {
        return $this->belongsTo(Post::class);
        //1쪽은 hasmany n쪽은 belongsto
    }
}
