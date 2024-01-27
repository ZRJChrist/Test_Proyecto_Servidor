<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
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
        $tasks = User::isAdmin() ? Tasks::all() : Tasks::all()->where('operator_id', Auth::user()->id);
        return view('tasks.tasks-index')->with(['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.tasks-create', [
            'provinces' => Province::select('name', 'id')->get(),
            'status' => Status::select('id', 'status_description')->get(),
            'operators' => User::select('id', 'name')->where('is_admin', false)->get(),
            'costumers' => Customer::select('id', 'name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskCreateRequest $request)
    {
        Tasks::create([
            'operator_id' => $request->operator,
            'customer_id' => $request->customer,
            'contact_name' => $request->name,
            'contact_phone' => $request->phone,
            'email' => $request->email,
            'title' => $request->title,
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'province_id' => $request->province,
            'status_id' => $request->status,
            'scheduled_at' => $request->date,
            'pre_notes' => $request->notes,
        ]);
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
