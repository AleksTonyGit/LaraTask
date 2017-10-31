<?php

namespace App\Models;

use \Esensi\Model\Model;


class List_task extends Model
{
    public $timestamps = false;
    protected $primaryKey='id';
    protected $table='task_lists';
    protected $fillable=['name','date_dead','status'];
    /*protected $rules=['name'=>['required','min:3','max:100','unique']];*/

    public function mark()
    {
        $this->status = !$this->status;
        $this->save();
    }
}
