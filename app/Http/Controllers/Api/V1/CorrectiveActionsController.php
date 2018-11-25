<?php

namespace App\Http\Controllers\Api\V1;

use App\CorrectiveAction;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\Admin\StoreCorrectiveActionsRequest;
use App\Http\Requests\Admin\UpdateCorrectiveActionsRequest;

class CorrectiveActionsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return CorrectiveAction::all();
    }

    public function show($id)
    {
        return CorrectiveAction::findOrFail($id);
    }

    public function update(UpdateCorrectiveActionsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $corrective_action = CorrectiveAction::findOrFail($id);
        $corrective_action->update($request->all());

        return $corrective_action;
    }

    public function store(StoreCorrectiveActionsRequest $request)
    {
        $request = $this->saveFiles($request);
        $corrective_action = CorrectiveAction::create($request->all());

        return $corrective_action;
    }

    public function destroy($id)
    {
        $corrective_action = CorrectiveAction::findOrFail($id);
        $corrective_action->delete();

        return '';
    }
}
