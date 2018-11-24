<?php

namespace App\Http\Controllers\Admin;

use App\CorrectiveAction;
use App\DiscrepantMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCorrectiveActionsRequest;
use App\Http\Requests\Admin\UpdateCorrectiveActionsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\DataTables\DataTables;

class CorrectiveActionsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of CorrectiveAction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('quality_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = CorrectiveAction::query();
            $query->with("discrepant_material");
            $template = 'actionsTemplate';
            if (request('show_deleted') == 1) {
                if (! Gate::allows('corrective_action_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'pluto_corrective_actions.id',
                'pluto_corrective_actions.discrepant_material_id',
                'pluto_corrective_actions.description_of_non_conformance',
                'pluto_corrective_actions.containment',
                'pluto_corrective_actions.interim_action',
                'pluto_corrective_actions.preventative_action',
                'pluto_corrective_actions.root_cause',
                'pluto_corrective_actions.verification',
                'pluto_corrective_actions.complete',
                'pluto_corrective_actions.completed_at',
                'pluto_corrective_actions.supporting_document',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'quality_';
                $routeKey = 'admin.corrective_actions';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('part_number', function ($row) {
               //return $row->discrepant_material ? $row->discrepant_material->part_number : '';
                $url = '<a href="'.route('admin.parts.show', ['id' => $row->discrepant_material->part_id]).'">'.$row->discrepant_material->part_number.'</a>';

                return $row->discrepant_material ? $url : '';
            });
            $table->editColumn('customer', function ($row) {
                return $row->discrepant_material ? $row->discrepant_material->customer_code : '';
            });
            $table->editColumn('process', function ($row) {
                return $row->discrepant_material ? $row->discrepant_material->process_code : '';
            });
            $table->editColumn('description_of_non_conformance', function ($row) {
                return $row->description_of_non_conformance ? $row->description_of_non_conformance : '';
            });
            $table->editColumn('containment', function ($row) {
                return $row->containment ? $row->containment : '';
            });
            $table->editColumn('interim_action', function ($row) {
                return $row->interim_action ? $row->interim_action : '';
            });
            $table->editColumn('preventative_action', function ($row) {
                return $row->preventative_action ? $row->preventative_action : '';
            });
            $table->editColumn('root_cause', function ($row) {
                return $row->root_cause ? $row->root_cause : '';
            });
            $table->editColumn('verification', function ($row) {
                return $row->verification ? $row->verification : '';
            });
            $table->editColumn('complete', function ($row) {
                return \Form::checkbox("complete", 1, $row->complete == 1, ["disabled"]);
            });
            $table->editColumn('completed_at', function ($row) {
                return $row->completed_at ? $row->completed_at : '';
            });
            $table->editColumn('supporting_document', function ($row) {
                if ($row->supporting_document) {
                    return '<a href="'.asset(env('UPLOAD_PATH').'/'.$row->supporting_document) .'" target="_blank">Download file</a>';
                };
            });

            $table->rawColumns(['actions','massDelete','complete','supporting_document', 'part_number']);

            return $table->make(true);
        }

        return view('admin.corrective_actions.index');
    }

    /**
     * Show the form for creating new CorrectiveAction.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('quality_create')) {
            return abort(401);
        }
        
        //$discrepant_materials = \App\DiscrepantMaterial::get()->pluck('part_number', 'id')->prepend('Please Select');
        //$discrepant_materials = DiscrepantMaterial::where('corrective_action_due_date')->pluck('workorder', 'id');
        $discrepant_materials = DiscrepantMaterial::where('corrective_action_due_date', '>', 0)->where('corrective_action_completed', '=', 0)->pluck('workorder', 'id');
        
        return view('admin.corrective_actions.create', compact('discrepant_materials'));
    }

    /**
     * Store a newly created CorrectiveAction in storage.
     *
     * @param  \App\Http\Requests\StoreCorrectiveActionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCorrectiveActionsRequest $request)
    {
        if (! Gate::allows('quality_create')) {
            return abort(401);
        }

        $corrective_action = CorrectiveAction::create($request->all());


        if ($request->hasFile('supporting_document')) {
            $request = $this->saveFiles($request, '/quality/corrective_actions', 'car_support_form_'.$corrective_action->id.'.'.$request->supporting_document->extension());
        }

        $request = $this->saveFiles($request);

        if ($corrective_action->complete) {
            $discrepant_material = DiscrepantMaterial::findOrFail($corrective_action->discrepant_material_id);
            $discrepant_material->corrective_action_completed = $corrective_action->id;
            $discrepant_material->save();
        }



        return redirect()->route('admin.corrective_actions.index');
    }


    /**
     * Show the form for editing CorrectiveAction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('quality_edit')) {
            return abort(401);
        }
        
        $discrepant_materials = \App\DiscrepantMaterial::get()->pluck('workorder', 'id');

        $corrective_action = CorrectiveAction::findOrFail($id);

        return view('admin.corrective_actions.edit', compact('corrective_action', 'discrepant_materials'));
    }

    /**
     * Update CorrectiveAction in storage.
     *
     * @param  \App\Http\Requests\UpdateCorrectiveActionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCorrectiveActionsRequest $request, $id)
    {
        if (! Gate::allows('quality_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $corrective_action = CorrectiveAction::findOrFail($id);
        $corrective_action->update($request->all());

        if ($corrective_action->complete) {
            $discrepant_material = DiscrepantMaterial::findOrFail($corrective_action->discrepant_material_id);
            $discrepant_material->corrective_action_completed = $corrective_action->id;
            $discrepant_material->save();
        }



        return redirect()->route('admin.corrective_actions.index');
    }


    /**
     * Display CorrectiveAction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('quality_view')) {
            return abort(401);
        }
        $corrective_action = CorrectiveAction::findOrFail($id);

        return view('admin.corrective_actions.show', compact('corrective_action'));
    }


    /**
     * Remove CorrectiveAction from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('quality_delete')) {
            return abort(401);
        }
        $corrective_action = CorrectiveAction::findOrFail($id);
        $corrective_action->delete();

        return redirect()->route('admin.corrective_actions.index');
    }

    /**
     * Delete all selected CorrectiveAction at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('quality_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CorrectiveAction::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore CorrectiveAction from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('quality_delete')) {
            return abort(401);
        }
        $corrective_action = CorrectiveAction::onlyTrashed()->findOrFail($id);
        $corrective_action->restore();

        return redirect()->route('admin.corrective_actions.index');
    }

    /**
     * Permanently delete CorrectiveAction from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('quality_delete')) {
            return abort(401);
        }
        $corrective_action = CorrectiveAction::onlyTrashed()->findOrFail($id);
        $corrective_action->forceDelete();

        return redirect()->route('admin.corrective_actions.index');
    }
}
