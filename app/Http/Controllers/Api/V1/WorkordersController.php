<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreWorkordersRequest;
use App\Http\Requests\Admin\UpdateWorkordersRequest;
use App\Workorder;

class WorkordersController extends Controller
{
    public function index()
    {
        return Workorder::all();
    }

    public function show($id)
    {
        return Workorder::findOrFail($id);
    }

    public function update(UpdateWorkordersRequest $request, $id)
    {
        $workorder = Workorder::findOrFail($id);
        $workorder->update($request->all());

        return $workorder;
    }

    public function store(StoreWorkordersRequest $request)
    {
        $workorder = Workorder::create($request->all());

        return $workorder;
    }

    public function destroy($id)
    {
        $workorder = Workorder::findOrFail($id);
        $workorder->delete();

        return '';
    }
}
