<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeling extends Model
{
    use HasFactory;

    protected $table = "feelings";
    // public function save(array $request = [])
    // {
    //     if (parent::save($request)) {
    //         $this->input('post_id', 'user_id', 'like', 'dislike', 'check');
    //     }
    // }

    protected $fillable = [
        'post_id', 'user_id', 'like', 'dislike', 'check'
    ];
}
