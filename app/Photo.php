<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $table = 'image_user';
    protected $fillable = ['id','images_id','image','created_at','update_at'];
}
