<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Province;
use App\Models\Customer;
use App\Models\User;
use App\Models\Status;
use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks.index')->with([
            'tasks' => Tasks::getTasksIndex(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create', [
            'provinces' => Province::select('name', 'id')->get(),
            'status' => Status::select('id', 'status_description')->get(),
            'operators' => User::select('id', 'name')->where('is_admin', false)->get(),
            'customers' => Customer::select('id', 'name')->where('active', '=', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskCreateRequest $request)
    {
        Tasks::create($request->all());
        return redirect(RouteServiceProvider::TASKS);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $task)
    {
        return view('tasks.show', ['task' => Tasks::getTaskShow($task->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $task)
    {
        return view('tasks.edit', [
            'task' => $task,
            'provinces' => Province::select('name', 'id')->get(),
            'status' => Status::select('id', 'status_description')->get(),
            'operators' => User::select('id', 'name')->where('is_admin', false)->get(),
            'customers' => Customer::select('id', 'name')->get(),
            'is_admin' => User::isAdmin(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Tasks $task)
    {
        $task->fill($request->validated());

        $task->save();
        return redirect(RouteServiceProvider::TASKS);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $task)
    {
        $task->active = !$task->active;
        $task->save();
        return redirect(RouteServiceProvider::TASKS);
    }
}
