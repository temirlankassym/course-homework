<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskHistory;

class TaskController extends Controller
{
    public function create(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $data['user_id'] = auth()->id();

        Task::create($data);

        return redirect('/tasks');
    }

    public function delete($id){
        Task::destroy('id',$id);
        return redirect('/tasks');
    }

    public function complete($id){
        Task::find($id)->update(['completed'=>true]);
        return redirect('/tasks');
    }

    public function showCompleted(){
        return view('completedTasks',['tasks'=>Task::getCompletedTasks()]);
    }

    public function show(){
        return view('dashboard',['tasks'=>Task::getTasks(),'weather'=>ApiController::getApiData()]);
    }
}
