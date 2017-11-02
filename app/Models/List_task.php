<?php

namespace App\Models;

use \Esensi\Model\Model;


class List_task extends Model
{
    public $timestamps = false;
    protected $primaryKey='id';
    protected $table='task_lists';
    protected $fillable=['name','date_dead','status'];

    public function mark()
    {
        $this->status = !$this->status;
        $this->save();
    }
}
