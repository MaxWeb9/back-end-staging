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

    /** Получение метода post **/

    public function store(TasksRequest $request)
    {
        $tasks = new Tasks();
        $data = $request->validated();
        $tasks->fill($data);
        $tasks->save();

        return $tasks;
    }

    /** Получение метода get **/

    public function tasks(Request $request, $id)
    {
        $tasks = App\Tasks::findOrFail($id);

        return $tasks;
    }

    /** Получение метода put **/

    public function edit(TasksRequest $request, $id)
    {
        $tasks = App\Tasks::findOrFail($id);
        $data = $request->validated();
        $tasks->fill($data);
        $tasks->save();

        return $tasks;
    }

    /** Получение метода delete **/

     public function delete(Request $request, $id)
     {
        $tasks = App\Tasks::findOrFail($id);
        $tasks->delete();

        return '';
     }

     /** Получение метода put **/

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
