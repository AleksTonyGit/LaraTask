<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Illuminate\Http\Request;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /* $task=new Task;       
        return view('task.create',['task'=>$task,'page'=>'AddTask']);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*  $task = new Task;
        $task->name=$request->name; 
        $task->save();         //сохраним в БД*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getId($id)
    {
        $task = DB::table('task_lists')->where('id', $id)->first();

        /*echo $task->name;
        echo '</br>';
        echo $task->id;   
        echo '</br>';
        echo $task->date_dead;*/
        
        return view('task.task',['id'=>$task->id,'name'=>$task->name, 'deadline'=>$task->date_dead]);

    }
}
