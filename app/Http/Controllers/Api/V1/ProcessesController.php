<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProcessesRequest;
use App\Http\Requests\Admin\UpdateProcessesRequest;
use App\Process;

class ProcessesController extends Controller
{
    public function index()
    {
        return Process::all();
    }

    public function show($id)
    {
        return Process::findOrFail($id);
    }

    public function update(UpdateProcessesRequest $request, $id)
    {
        $process = Process::findOrFail($id);
        $process->update($request->all());

        return $process;
    }

    public function store(StoreProcessesRequest $request)
    {
        $process = Process::create($request->all());

        return $process;
    }

    public function destroy($id)
    {
        $process = Process::findOrFail($id);
        $process->delete();

        return '';
    }
}
