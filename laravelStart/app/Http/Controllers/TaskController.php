<?php

namespace App\Http\Controllers;

use App\Services\WeatherApiService;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    private WeatherApiService $weatherApiService;

    public function __construct(WeatherApiService $weatherApiService)
    {
        $this->weatherApiService = $weatherApiService;
    }

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

    public function showCompletedTasks(){
        return view('completedTasks',['tasks'=>Task::getCompletedTasks()]);
    }

    public function show(){
        return view('tasks',['tasks'=>Task::getTasks(),'weather'=>$this->weatherApiService->getApiData()]);
    }
}
