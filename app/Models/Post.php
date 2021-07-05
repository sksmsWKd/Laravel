<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $table = 'my_posts'
    //만약 테이블 이름이 posts 가 아니고 다른거면 명시를 해줌.
    use HasFactory;

    public function imagePath()
    {
        //$path = '/storage/images';
        $path = env('IMAGE_PATH', '/storage/images/');
        $imageFile = $this->image ?? 'no_img.jpg';
        return $path . $imageFile;
    }
}
