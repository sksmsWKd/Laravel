<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class Post extends Model
{
    //protected $table = 'my_posts'
    //만약 테이블 이름이 posts 가 아니고 다른거면 명시를 해줌.
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'story'];


    public function imagePath()
    {
        //$path = '/storage/images';
        $path = env('IMAGE_PATH', '/storage/images/');
        $imageFile = $this->image ?? 'no_img.jpg';
        return $path . $imageFile;
    }

    public function user()
    {
        //연결되는 이름

        return $this->belongsTo(User::class);
        //모델객체클래스 , 외래키  , 기본키 인데,
        //관례에 따르면 외래키 기본키 안적어도 ㄱㅊ

    }

    public function viewers()
    {
        return $this->belongsToMany(User::class, 'post_user', 'post_id', 'user_id', 'id', 'id', 'users');
        //                                       pivot 테이블    pivot 키 related pivot키 parentKey relatedKey
    }

    public function searchableAs()
    {
        return 'posts';
    }
}
