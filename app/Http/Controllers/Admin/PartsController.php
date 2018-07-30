<?php

namespace App\Http\Controllers\Admin;

use App\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePartsRequest;
use App\Http\Requests\Admin\UpdatePartsRequest;
use Yajra\DataTables\DataTables;

class PartsController extends Controller
{
    /**
     * Display a listing of Part.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('part_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Part::query();
            $query->with("customer");
            $query->with("process");
            $template = 'actionsTemplate';
            
            $query->select([
                'sft_parts.id',
                'sft_parts.number',
                'sft_parts.description',
                'sft_parts.customer_code',
                'sft_parts.process_code',
                'sft_parts.method_code',
                'sft_parts.price',
                'sft_parts.price_code',
                'sft_parts.certify',
                'sft_parts.specification',
                'sft_parts.bake',
                'sft_parts.procedure_code',
                'sft_parts.material',
                'sft_parts.material_name',
                'sft_parts.material_condition',
                'sft_parts.thickness_minimum',
                'sft_parts.thickness_maximum',
                'sft_parts.thickness_unit_code',
                'sft_parts.surface_area',
                'sft_parts.surface_area_unit_code',
                'sft_parts.weight',
                'sft_parts.weight_unit_code',
                'sft_parts.length',
                'sft_parts.width',
                'sft_parts.height',
                'sft_parts.dimension_unit_code',
                'sft_parts.material_thickness',
                'sft_parts.material_thickness_unit_code',
                'sft_parts.special_requirement',
                'sft_parts.note',
                'sft_parts.quality_check_1',
                'sft_parts.quality_check_2',
                'sft_parts.quality_check_3',
                'sft_parts.quality_check_4',
                'sft_parts.quality_check_5',
                'sft_parts.quality_check_6',
                'sft_parts.archive',
                'sft_parts.revision',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'part_';
                $routeKey = 'admin.parts';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('customer.code', function ($row) {
                return $row->customer ? $row->customer->code : '';
            });
            $table->editColumn('process.code', function ($row) {
                return $row->process ? $row->process->code : '';
            });
            $table->editColumn('method_code', function ($row) {
                return $row->method_code ? $row->method_code : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('price_code', function ($row) {
                return $row->price_code ? $row->price_code : '';
            });
            $table->editColumn('certify', function ($row) {
                return \Form::checkbox("certify", 1, $row->certify == 1, ["disabled"]);
            });
            $table->editColumn('specification', function ($row) {
                return $row->specification ? $row->specification : '';
            });
            $table->editColumn('bake', function ($row) {
                return \Form::checkbox("bake", 1, $row->bake == 1, ["disabled"]);
            });
            $table->editColumn('procedure_code', function ($row) {
                return $row->procedure_code ? $row->procedure_code : '';
            });
            $table->editColumn('material', function ($row) {
                return $row->material ? $row->material : '';
            });
            $table->editColumn('material_name', function ($row) {
                return $row->material_name ? $row->material_name : '';
            });
            $table->editColumn('material_condition', function ($row) {
                return $row->material_condition ? $row->material_condition : '';
            });
            $table->editColumn('thickness_minimum', function ($row) {
                return $row->thickness_minimum ? $row->thickness_minimum : '';
            });
            $table->editColumn('thickness_maximum', function ($row) {
                return $row->thickness_maximum ? $row->thickness_maximum : '';
            });
            $table->editColumn('thickness_unit_code', function ($row) {
                return $row->thickness_unit_code ? $row->thickness_unit_code : '';
            });
            $table->editColumn('surface_area', function ($row) {
                return $row->surface_area ? $row->surface_area : '';
            });
            $table->editColumn('surface_area_unit_code', function ($row) {
                return $row->surface_area_unit_code ? $row->surface_area_unit_code : '';
            });
            $table->editColumn('weight', function ($row) {
                return $row->weight ? $row->weight : '';
            });
            $table->editColumn('weight_unit_code', function ($row) {
                return $row->weight_unit_code ? $row->weight_unit_code : '';
            });
            $table->editColumn('length', function ($row) {
                return $row->length ? $row->length : '';
            });
            $table->editColumn('width', function ($row) {
                return $row->width ? $row->width : '';
            });
            $table->editColumn('height', function ($row) {
                return $row->height ? $row->height : '';
            });
            $table->editColumn('dimension_unit_code', function ($row) {
                return $row->dimension_unit_code ? $row->dimension_unit_code : '';
            });
            $table->editColumn('material_thickness', function ($row) {
                return $row->material_thickness ? $row->material_thickness : '';
            });
            $table->editColumn('material_thickness_unit_code', function ($row) {
                return $row->material_thickness_unit_code ? $row->material_thickness_unit_code : '';
            });
            $table->editColumn('special_requirement', function ($row) {
                return $row->special_requirement ? $row->special_requirement : '';
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });
            $table->editColumn('quality_check_1', function ($row) {
                return $row->quality_check_1 ? $row->quality_check_1 : '';
            });
            $table->editColumn('quality_check_2', function ($row) {
                return $row->quality_check_2 ? $row->quality_check_2 : '';
            });
            $table->editColumn('quality_check_3', function ($row) {
                return $row->quality_check_3 ? $row->quality_check_3 : '';
            });
            $table->editColumn('quality_check_4', function ($row) {
                return $row->quality_check_4 ? $row->quality_check_4 : '';
            });
            $table->editColumn('quality_check_5', function ($row) {
                return $row->quality_check_5 ? $row->quality_check_5 : '';
            });
            $table->editColumn('quality_check_6', function ($row) {
                return $row->quality_check_6 ? $row->quality_check_6 : '';
            });
            $table->editColumn('archive', function ($row) {
                return \Form::checkbox("archive", 1, $row->archive == 1, ["disabled"]);
            });
            $table->editColumn('revision', function ($row) {
                return $row->revision ? $row->revision : '';
            });

            $table->rawColumns(['actions','massDelete','certify','bake','archive']);

            return $table->make(true);
        }

        return view('admin.parts.index');
    }

    /**
     * Show the form for creating new Part.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('part_create')) {
            return abort(401);
        }
        
        $customers = \App\Customer::get()->pluck('code', 'code')->prepend(trans('global.app_please_select'), '');
        $processes = \App\Process::get()->pluck('code', 'code')->prepend(trans('global.app_please_select'), '');

        return view('admin.parts.create', compact('customers', 'processes'));
    }

    /**
     * Store a newly created Part in storage.
     *
     * @param  \App\Http\Requests\StorePartsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartsRequest $request)
    {
        if (! Gate::allows('part_create')) {
            return abort(401);
        }

        $part = Part::create($request->all());



        return redirect()->route('admin.parts.index');
    }


    /**
     * Show the form for editing Part.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('part_edit')) {
            return abort(401);
        }
        
        $customers = \App\Customer::get()->pluck('code', 'code')->prepend(trans('global.app_please_select'), '');
        $processes = \App\Process::get()->pluck('code', 'code')->prepend(trans('global.app_please_select'), '');

        $part = Part::findOrFail($id);

        return view('admin.parts.edit', compact('part', 'customers', 'processes'));
    }

    /**
     * Update Part in storage.
     *
     * @param  \App\Http\Requests\UpdatePartsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartsRequest $request, $id)
    {
        if (! Gate::allows('part_edit')) {
            return abort(401);
        }
        $part = Part::findOrFail($id);
        $part->update($request->all());



        return redirect()->route('admin.parts.index');
    }


    /**
     * Display Part.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('part_view')) {
            return abort(401);
        }
        $discrepant_materials = \App\DiscrepantMaterial::where('process_id', $id)->get();
        $part = Part::findOrFail($id);

        return view('admin.parts.show', compact('part', 'discrepant_materials'));
    }


    /**
     * Remove Part from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('part_delete')) {
            return abort(401);
        }
        $part = Part::findOrFail($id);
        $part->delete();

        return redirect()->route('admin.parts.index');
    }

    /**
     * Delete all selected Part at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('part_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Part::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
