<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_play extends Model
{
    protected $table = 'users_play';
    protected $fillable = ['id', 'name', 'phone', 'mail', 'child_name', 'child_date', 'address', 'province', 'post_code', 'join_date', 'choice'];

    public function Image()
    {
    	return $this->hasOne('App\Photo', 'image_id');
    }
}
