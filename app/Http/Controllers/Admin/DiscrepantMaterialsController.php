<?php

namespace App\Http\Controllers\Admin;
use App\Workorder;
use App\Process;
use App\Customer;
use App\DiscrepantMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDiscrepantMaterialsRequest;
use App\Http\Requests\Admin\UpdateDiscrepantMaterialsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\DataTables\DataTables;

class DiscrepantMaterialsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of DiscrepantMaterial.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('quality_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = DiscrepantMaterial::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('quality_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'pluto_discrepant_materials.id',
                'pluto_discrepant_materials.workorder',
                'pluto_discrepant_materials.part_number',
                'pluto_discrepant_materials.customer_code',
                'pluto_discrepant_materials.process_code',
                'pluto_discrepant_materials.quantity_rejected',
                'pluto_discrepant_materials.reason_for_rejection',
                'pluto_discrepant_materials.rejection_date',
                'pluto_discrepant_materials.rejection_type',
                'pluto_discrepant_materials.corrective_action_due_date',

            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'quality_';
                $routeKey = 'admin.discrepant_materials';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('workorder', function ($row) {
                return $row->workorder ? $row->workorder : '';
            });

            $table->editColumn('part_number', function ($row) {
                return $row->part_number ? $row->part_number : '';
            });

            $table->editColumn('customer_code', function ($row) {
                return $row->customer_code ? $row->customer_code : '';
            });

            $table->editColumn('process_code', function ($row) {
                return $row->process_code ? $row->process_code : '';
            });
            $table->editColumn('quantity_rejected', function ($row) {
                return $row->quantity_rejected ? $row->quantity_rejected : '';
            });
            $table->editColumn('reason_for_rejection', function ($row) {
                return $row->reason_for_rejection ? $row->reason_for_rejection : '';
            });
            $table->editColumn('rejection_date', function ($row) {
                return $row->rejection_date ? $row->rejection_date : '';
            });
            $table->editColumn('rejection_type', function ($row) {
                return $row->rejection_type ? $row->rejection_type : '';
            });
            $table->editColumn('corrective_action_due_date', function ($row) {
                return $row->corrective_action_due_date ? $row->corrective_action_due_date : '';
            });

            $table->rawColumns(['actions','massDelete','form']);

            return $table->make(true);
        }

        return view('admin.discrepant_materials.index');
    }

    /**
     * Show the form for creating new DiscrepantMaterial.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('quality_create')) {
            return abort(401);
        }
        
        $enum_rejection_type = DiscrepantMaterial::$enum_rejection_type;
            
        return view('admin.discrepant_materials.create', compact('enum_rejection_type'));
    }

    /**
     * Store a newly created DiscrepantMaterial in storage.
     *
     * @param  \App\Http\Requests\StoreDiscrepantMaterialsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscrepantMaterialsRequest $request)
    {
        if (! Gate::allows('quality_create')) {
            return abort(401);
        }
        $wo = Workorder::where('number', '=', $request->workorder)->first();
        $customer = Customer::where('code', '=', $wo->customer_code)->first();
        $process = Process::where('code', '=', $wo->process_code)->first();
  

        
        // Build the request to fill in the table
        $request->request->add(['workorder_id' => $wo->id]);
        $request->request->add(['customer_id' => $customer->id]);
        $request->request->add(['customer_code' => $wo->customer_code]);
        $request->request->add(['process_id' => $process->id]);
        $request->request->add(['process_code' => $wo->process_code]);
        $request->request->add(['part_id' => $wo->part_id]);
        $request->request->add(['part_number' => $wo->part_number]);        
                
        $request = $this->saveFiles($request);

        $discrepant_material = DiscrepantMaterial::create($request->all());


        foreach ($request->input('picture_id', []) as $index => $id) {
            $model          = config('laravel-medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $discrepant_material->id;
            $file->save();
        }

        return redirect()->route('admin.discrepant_materials.index');
    }


    /**
     * Show the form for editing DiscrepantMaterial.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('quality_edit')) {
            return abort(401);
        }
        

        $enum_rejection_type = DiscrepantMaterial::$enum_rejection_type;
            
        $discrepant_material = DiscrepantMaterial::findOrFail($id);

        return view('admin.discrepant_materials.edit', compact('discrepant_material', 'enum_rejection_type'));
    }

    /**
     * Update DiscrepantMaterial in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscrepantMaterialsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscrepantMaterialsRequest $request, $id)
    {
        if (! Gate::allows('quality_edit')) {
            return abort(401);
        }
        $wo = Workorder::where('number', '=', $request->workorder)->first();
        $customer = Customer::where('code', '=', $wo->customer_code)->first();
        $process = Process::where('code', '=', $wo->process_code)->first();
  

        
        // Build the request to fill in the table
        $request->request->add(['workorder_id' => $wo->id]);
        $request->request->add(['customer_id' => $customer->id]);
        $request->request->add(['customer_code' => $wo->customer_code]);
        $request->request->add(['process_id' => $process->id]);
        $request->request->add(['process_code' => $wo->process_code]);
        $request->request->add(['part_id' => $wo->part_id]);
        $request->request->add(['part_number' => $wo->part_number]); 
        
        $request = $this->saveFiles($request);
        $discrepant_material = DiscrepantMaterial::findOrFail($id);
        $discrepant_material->update($request->all());


        $media = [];
        foreach ($request->input('picture_id', []) as $index => $id) {
            $model          = config('laravel-medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $discrepant_material->id;
            $file->save();
            $media[] = $file->toArray();
        }
        $discrepant_material->updateMedia($media, 'picture');

        return redirect()->route('admin.discrepant_materials.index');
    }


    /**
     * Display DiscrepantMaterial.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('quality_view')) {
            return abort(401);
        }
        $discrepant_material = DiscrepantMaterial::findOrFail($id);

        return view('admin.discrepant_materials.show', compact('discrepant_material'));
    }


    /**
     * Remove DiscrepantMaterial from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('quality_delete')) {
            return abort(401);
        }
        $discrepant_material = DiscrepantMaterial::findOrFail($id);
        $discrepant_material->deletePreservingMedia();

        return redirect()->route('admin.discrepant_materials.index');
    }

    /**
     * Delete all selected DiscrepantMaterial at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('quality_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = DiscrepantMaterial::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->deletePreservingMedia();
            }
        }
    }


    /**
     * Restore DiscrepantMaterial from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('quality_delete')) {
            return abort(401);
        }
        $discrepant_material = DiscrepantMaterial::onlyTrashed()->findOrFail($id);
        $discrepant_material->restore();

        return redirect()->route('admin.discrepant_materials.index');
    }

    /**
     * Permanently delete DiscrepantMaterial from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('quality_delete')) {
            return abort(401);
        }
        $discrepant_material = DiscrepantMaterial::onlyTrashed()->findOrFail($id);
        $discrepant_material->forceDelete();

        return redirect()->route('admin.discrepant_materials.index');
    }
}
