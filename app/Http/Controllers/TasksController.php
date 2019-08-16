<?php

namespace App\Http\Controllers;

use App\Tasks;
use Illuminate\Http\Request;
use App;
use App\Http\Requests\TasksRequest;

class TasksController extends Controller
{
    public function index(Request $request)
    {
        $tasks = App\Tasks::all();
        return $tasks;
    }

    public function store(TasksRequest $request)
    {
        $tasks = new Tasks();
        $data = $request->validated();
        $tasks->fill($data);
        $tasks->save();

        return $tasks;
    }

    public function tasks(Request $request, $id)
    {
        $tasks = App\Tasks::findOrFail($id);

        return $tasks;

        {
        $tasks = App\Tasks::findOrFail($id);
        return $tasks;
        }
    }

    public function edit(TasksRequest $request, $id)
    {
        $tasks = App\Tasks::findOrFail($id);
        $data = $request->validated();
        $tasks->fill($data);
        $tasks->save();

        return $tasks;
    }

     public function delete(Request $request, $id)
     {
        $tasks = App\Tasks::findOrFail($id);
        $tasks->delete();

        return '';
     }

    public function close(Request $request, $id)
    {

        $tasks = App\Tasks::findOrFail($id);
        if ($tasks->status != 0) {
            $tasks->status = 0;
            $tasks->save();
            return $tasks;
        }
        else {
            return "Уже закрыто";
        }
    }


}
