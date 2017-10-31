<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    public $timestamps = false;
    protected $fillable=['task_id','comment','author','date_comment'];
}
