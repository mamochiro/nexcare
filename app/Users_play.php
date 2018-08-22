<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_play extends Model
{
    protected $table = 'users_play';
    protected $fillable = ['id', 'name', 'phone', 'mail', 'child_name', 'child_date', 'address', 'province', 'post_code', 'join_date', 'choice', 'user_id'];

    public function image()
    {
    	return $this->hasOne('App\Photo', 'image_id');
    }
}
