<?php

namespace App\Http\Controllers\Admin;

use App\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProcessesRequest;
use App\Http\Requests\Admin\UpdateProcessesRequest;
use Yajra\DataTables\DataTables;

class ProcessesController extends Controller
{
    /**
     * Display a listing of Process.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('process_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Process::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('process_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'sft_processes.id',
                'sft_processes.code',
                'sft_processes.name',
                'sft_processes.minimum_lot_charge',
                'sft_processes.compliant_rohs',
                'sft_processes.compliant_reach',
                'sft_processes.archive',
                'sft_processes.revision',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'process_';
                $routeKey = 'admin.processes';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('minimum_lot_charge', function ($row) {
                return $row->minimum_lot_charge ? $row->minimum_lot_charge : '';
            });
            $table->editColumn('compliant_rohs', function ($row) {
                return \Form::checkbox("compliant_rohs", 1, $row->compliant_rohs == 1, ["disabled"]);
            });
            $table->editColumn('compliant_reach', function ($row) {
                return \Form::checkbox("compliant_reach", 1, $row->compliant_reach == 1, ["disabled"]);
            });
            $table->editColumn('archive', function ($row) {
                return \Form::checkbox("archive", 1, $row->archive == 1, ["disabled"]);
            });
            $table->editColumn('revision', function ($row) {
                return $row->revision ? $row->revision : '';
            });

            $table->rawColumns(['actions','massDelete','compliant_rohs','compliant_reach','archive']);

            return $table->make(true);
        }

        return view('admin.processes.index');
    }

    /**
     * Show the form for creating new Process.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('process_create')) {
            return abort(401);
        }
        return view('admin.processes.create');
    }

    /**
     * Store a newly created Process in storage.
     *
     * @param  \App\Http\Requests\StoreProcessesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProcessesRequest $request)
    {
        if (! Gate::allows('process_create')) {
            return abort(401);
        }
        $process = Process::create($request->all());



        return redirect()->route('admin.processes.index');
    }


    /**
     * Show the form for editing Process.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('process_edit')) {
            return abort(401);
        }
        $process = Process::findOrFail($id);

        return view('admin.processes.edit', compact('process'));
    }

    /**
     * Update Process in storage.
     *
     * @param  \App\Http\Requests\UpdateProcessesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProcessesRequest $request, $id)
    {
        if (! Gate::allows('process_edit')) {
            return abort(401);
        }
        $process = Process::findOrFail($id);
        $process->update($request->all());



        return redirect()->route('admin.processes.index');
    }


    /**
     * Display Process.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('process_view')) {
            return abort(401);
        }
        $quotes = \App\Quote::where('process_id', $id)->get();

        $process = Process::findOrFail($id);

        return view('admin.processes.show', compact('process', 'quotes'));
    }


    /**
     * Remove Process from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('process_delete')) {
            return abort(401);
        }
        $process = Process::findOrFail($id);
        $process->delete();

        return redirect()->route('admin.processes.index');
    }

    /**
     * Delete all selected Process at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('process_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Process::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Process from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('process_delete')) {
            return abort(401);
        }
        $process = Process::onlyTrashed()->findOrFail($id);
        $process->restore();

        return redirect()->route('admin.processes.index');
    }

    /**
     * Permanently delete Process from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('process_delete')) {
            return abort(401);
        }
        $process = Process::onlyTrashed()->findOrFail($id);
        $process->forceDelete();

        return redirect()->route('admin.processes.index');
    }
}
