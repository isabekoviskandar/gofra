<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWorkerRequest;
use App\Http\Requests\StoreWorkerRequest;
use App\Models\Section;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::orderBy('id', 'desc')->paginate(10);
        return view('hr.workers.index', compact('workers'));
    }

    public function create()
    {
        $users = User::all();
        $sections = Section::all();
        return view('hr.workers.create', compact('sections', 'users'));
    }

    public function store(StoreWorkerRequest $request)
    {
        Worker::create($request->validated());
        return redirect()->route('workers.index')->with('create', 'Worker created successfully.');
    }

    public function edit(Worker $worker)
    {
        $sections = Section::all();
        $users = User::all();
        return view('hr.workers.edit', compact('worker', 'sections', 'users'));
    }

    public function update(UpdateWorkerRequest $request, Worker $worker)
    {
        $worker->update($request->validated());
        return redirect()->route('workers.index')->with('update', 'Worker updated successfully.');
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();
        return redirect()->route('workers.index')->with('delete', 'Worker deleted successfully.');
    }
}
