<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;    


class TaskController extends Controller
{
public function index()
    {
         $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            //$tasks = Task::all();
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
            return view('tasks.index', $data);
        }else {
            return view('welcome');
}
    }


 public function create()
    {
        $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);
    }

     public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:10',   // add
            'content' => 'required|max:191',
        ]);                                                                                                               


        $task = new Task;
        $task->status = $request->status;    // add
        $task->content = $request->content;
        $task->user_id = \Auth::user()->id;
        $task->save();


        return redirect('/');
    }

public function show($id)
    {
          if(\Auth::check())
        {
        $task = Task::find($id);
        $user = \Auth::user();
        
        if (\Auth::user()->id === $task->user_id) {
        return view('tasks.show', [
            'task' => $task,
            'user' => $user,
        ]);
        }
        else{
           return redirect('/');
            }
        }
    else{
        return view ('welcome');
    }
    }

  public function edit($id)
    {
if(\Auth::check())
        {
        $task = Task::find($id);
        $user = \Auth::user();
        
        if (\Auth::user()->id === $task->user_id) {
        return view('tasks.edit', [
            'task' => $task,
            'user' => $user,
        ]);
        }
        else{
           return redirect('/');
            }
        }
    else{
        return view ('welcome');
    }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|max:10',   // add
            'content' => 'required|max:191',
        ]);


        $task = Task::find($id);
        $task->status = $request->status;    // add
        $task->content = $request->content;
        $task->save();


        return redirect('/');
    }

 public function destroy($id)
    {
       if(\Auth::check())
        {
        $task = Task::find($id);
        $user = \Auth::user();
        
        if (\Auth::user()->id === $task->user_id) {
        return view('tasks.show', [
            'task' => $task,
            'user' => $user,
        ]);
        }
        else{
           return redirect('/');
            }
        }
        else{
        return view ('welcome');
        }
    }
}