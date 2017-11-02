<?php

namespace App\Http\Controllers;

use App\Models\List_task;
use App\Models\Comment;
use Illuminate\Http\Request;


class ListController extends Controller
{
    /*отображение всех тасков*/
    public function showAll()
    {
        $lists= List_task::orderBy('status', 'ASC')->orderBy('date_dead', 'ASC')->get();
        return view('list/list', ['lists' => $lists]);
    }

    /*вывод формы создания нового таска*/
    public function create()
    {
        return view('list.createTask');
    }

    /*обработка формы создания нового таска и запись его в БД*/
    public function store(Request $request )
    {
        $this->validate($request,
            [
                'name' => 'required|min:3',
                'date_dead' => 'required|date',
            ]);
        $data = [
                    'status'    => 0,
                    'name'      => $request->name,
                    'date_dead' => $request->date_dead,
                ];

        $newTask = List_task::create($data);

        return redirect()->route('list');
    }


    /*перемещение таска и отметка чек при клике на чекбокс таска*/
    public function postIndex(Request $request)
    {
        $id = $request->input('task_id');
        $item = List_task::findOrFail($id);
        $item->mark();
        return redirect()->route('list');
    }

    /*отображение информации таска при клике по нему*/
    public function showTask($id)
    {
        $tasks = Comment::where('task_id',$id)->get();
        $items = List_task::where('id',$id)->get();
        return view('comment/comment', compact('tasks','items'));
    }


    /*обработка формы добавления комментария*/
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
