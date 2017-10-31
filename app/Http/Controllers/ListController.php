<?php

namespace App\Http\Controllers;

use App\Models\List_task;
use App\Models\Comment;
use Illuminate\Http\Request;


class ListController extends Controller
{
    public function showAll()
    {
        /*$lists = List_task::all()
                ->orderBy('date_dead', 'status')
                ->get();*/

        /*$lists = laratask::table('task_lists')
            ->orderBy('date_dead', 'status')
            ->get();*/
        $lists= List_task::orderBy('status', 'ASC')->orderBy('date_dead', 'ASC')->get();

        return view('list/list', ['lists' => $lists]);
    }

    public function create()
    {
        return view('list.createTask');
    }

    public function store(Request $request )
    {
        /*$request['status'] = 0;
        List_task::create($request->all());
        if()
        return redirect()->route('list');*/

        $this->validate($request, [
            'name' => 'required|min:3',
            'date_dead' => 'required|date',
        ]);
        //$task=new List_task;
        //$task->name = $request->name;
        //$task->date_dead = $request->date_dead;
        //$task->save();

//        $data['status'] = 0;
//        $data['name'] = $request->name;
//        $data['date_dead'] = $request->date_dead;

        $data = [
            'status'    => 0,
            'name'      => $request->name,
            'date_dead' => $request->date_dead,
        ];

        $newTask = List_task::create($data);

        return redirect()->route('list');

         /*   ->with('message','Вы добавили TASK');*/
        //if(!$task->save());
        //{
        //    $err=$task->getErrors();
        //    return redirect()->route('list')->
        //    with('errors',$err)->withInput();
        //}
        //return redirect()->action('list')->
        //    with('message','Вы добавили TASK');
    }
    public function postIndex(Request $request)
    {
        $id = $request->input('task_id');
        $item = List_task::findOrFail($id);
        $item->mark();

        return redirect()->route('list');
    }

    public function showTask($id)
    {

        $tasks = Comment::where('task_id',$id)->get();
        $items = List_task::where('id',$id)->get();
        /*return view('comment/comment',['items' => $items]);*/
        return view('comment/comment', compact('tasks','items'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeComment(Request $request)
    {
        $this->validate($request, [
            'comment'       => 'required|min:3',
            'author'        => 'required|min:3',
            'date_comment'  => 'required|date',
        ]);

        $comment['comment'] = $request->comment;
        $comment['author'] = $request->author;
        $comment['task_id'] = $request->task_id;
        $comment['date_comment'] = $request->date_comment;




       $createComment = Comment::create($comment);
        return redirect()->route('list');
    }





}
