<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreWorkordersRequest;
use App\Http\Requests\Admin\UpdateWorkordersRequest;
use App\Workorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class WorkordersController extends Controller
{
    /**
     * Display a listing of Workorder.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('workorder_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = Workorder::query();
            $query->with('customer');
            $query->with('part');
            $query->with('process');
            $template = 'actionsTemplate';

            $query->select([
                'sft_work_orders.id',
                'sft_work_orders.number',
                'sft_work_orders.customer_code',
                'sft_work_orders.part_id',
                'sft_work_orders.part_number',
                'sft_work_orders.process_code',
                'sft_work_orders.price',
                'sft_work_orders.price_code',
                'sft_work_orders.date_received',
                'sft_work_orders.date_required',
                'sft_work_orders.customer_purchase_order',
                'sft_work_orders.customer_packing_list',
                'sft_work_orders.quantity',
                'sft_work_orders.unit_code',
                'sft_work_orders.quantity_shipped',
                'sft_work_orders.our_last_packing_list',
                // 'sft_work_orders.destination_code',
                // 'sft_work_orders.carrier_code',
                // 'sft_work_orders.freight_code',
                // 'sft_work_orders.date_shipped',
                // 'sft_work_orders.invoice_number',
                // 'sft_work_orders.invoice_date',
                // 'sft_work_orders.invoice_amount',
                // 'sft_work_orders.priority',
                 'sft_work_orders.rework',
                // 'sft_work_orders.hot',
                 'sft_work_orders.started',
                 'sft_work_orders.completed',
                // 'sft_work_orders.shipped',
                // 'sft_work_orders.cod',
                // 'sft_work_orders.invoiced',
                // 'sft_work_orders.note',
                // 'sft_work_orders.session_id',
                // 'sft_work_orders.archive',
                // 'sft_work_orders.revision',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'workorder_';
                $routeKey = 'admin.workorders';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
            });
            $table->editColumn('customer.code', function ($row) {
                return $row->customer ? $row->customer->code : '';
            });
            $table->editColumn('part.number', function ($row) {
                return $row->part ? $row->part->number : '';
            });
            $table->editColumn('part_number', function ($row) {
                return $row->part_number ? $row->part_number : '';
            });
            $table->editColumn('process.code', function ($row) {
                return $row->process ? $row->process->code : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('price_code', function ($row) {
                return $row->price_code ? $row->price_code : '';
            });
            $table->editColumn('date_received', function ($row) {
                return $row->date_received ? date('Y-m-d', strtotime($row->date_received)) : '';
            });
            $table->editColumn('date_required', function ($row) {
                return $row->date_required ? date('Y-m-d', strtotime($row->date_required)) : '';
            });
            $table->editColumn('customer_purchase_order', function ($row) {
                return $row->customer_purchase_order ? $row->customer_purchase_order : '';
            });
            $table->editColumn('customer_packing_list', function ($row) {
                return $row->customer_packing_list ? $row->customer_packing_list : '';
            });
            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });
            $table->editColumn('unit_code', function ($row) {
                return $row->unit_code ? $row->unit_code : '';
            });
            $table->editColumn('quantity_shipped', function ($row) {
                return $row->quantity_shipped ? $row->quantity_shipped : '';
            });
            $table->editColumn('our_last_packing_list', function ($row) {
                return $row->our_last_packing_list ? $row->our_last_packing_list : '';
            });
            $table->editColumn('destination_code', function ($row) {
                return $row->destination_code ? $row->destination_code : '';
            });
            $table->editColumn('carrier_code', function ($row) {
                return $row->carrier_code ? $row->carrier_code : '';
            });
            $table->editColumn('freight_code', function ($row) {
                return $row->freight_code ? $row->freight_code : '';
            });
            $table->editColumn('date_shipped', function ($row) {
                return $row->date_shipped ? $row->date_shipped : '';
            });
            $table->editColumn('invoice_number', function ($row) {
                return $row->invoice_number ? $row->invoice_number : '';
            });
            $table->editColumn('invoice_date', function ($row) {
                return $row->invoice_date ? $row->invoice_date : '';
            });
            $table->editColumn('invoice_amount', function ($row) {
                return $row->invoice_amount ? $row->invoice_amount : '';
            });
            $table->editColumn('priority', function ($row) {
                return $row->priority ? $row->priority : '';
            });
            $table->editColumn('rework', function ($row) {
                return \Form::checkbox('rework', 1, $row->rework == 1, ['disabled']);
            });
            $table->editColumn('hot', function ($row) {
                return \Form::checkbox('hot', 1, $row->hot == 1, ['disabled']);
            });
            $table->editColumn('started', function ($row) {
                return \Form::checkbox('started', 1, $row->started == 1, ['disabled']);
            });
            $table->editColumn('completed', function ($row) {
                return \Form::checkbox('completed', 1, $row->completed == 1, ['disabled']);
            });
            $table->editColumn('shipped', function ($row) {
                return \Form::checkbox('shipped', 1, $row->shipped == 1, ['disabled']);
            });
            $table->editColumn('cod', function ($row) {
                return \Form::checkbox('cod', 1, $row->cod == 1, ['disabled']);
            });
            $table->editColumn('invoiced', function ($row) {
                return \Form::checkbox('invoiced', 1, $row->invoiced == 1, ['disabled']);
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });
            $table->editColumn('session_id', function ($row) {
                return $row->session_id ? $row->session_id : '';
            });
            $table->editColumn('archive', function ($row) {
                return \Form::checkbox('archive', 1, $row->archive == 1, ['disabled']);
            });
            $table->editColumn('revision', function ($row) {
                return $row->revision ? $row->revision : '';
            });

            $table->rawColumns(['actions', 'massDelete', 'rework', 'hot', 'started', 'completed', 'shipped', 'cod', 'invoiced', 'archive']);

            return $table->make(true);
        }

        return view('admin.workorders.index');
    }

    /**
     * Show the form for creating new Workorder.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('workorder_create')) {
            return abort(401);
        }

        $customers = \App\Customer::get()->pluck('code', 'id')->prepend(trans('global.app_please_select'), '');
        $parts = \App\Part::get()->pluck('number', 'id')->prepend(trans('global.app_please_select'), '');
        $processes = \App\Process::get()->pluck('code', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.workorders.create', compact('customers', 'parts', 'processes'));
    }

    /**
     * Store a newly created Workorder in storage.
     *
     * @param \App\Http\Requests\StoreWorkordersRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkordersRequest $request)
    {
        if (!Gate::allows('workorder_create')) {
            return abort(401);
        }
        $workorder = Workorder::create($request->all());

        return redirect()->route('admin.workorders.index');
    }

    /**
     * Show the form for editing Workorder.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('workorder_edit')) {
            return abort(401);
        }

        $customers = \App\Customer::get()->pluck('code', 'id')->prepend(trans('global.app_please_select'), '');
        $parts = \App\Part::get()->pluck('number', 'id')->prepend(trans('global.app_please_select'), '');
        $processes = \App\Process::get()->pluck('code', 'id')->prepend(trans('global.app_please_select'), '');

        $workorder = Workorder::findOrFail($id);

        return view('admin.workorders.edit', compact('workorder', 'customers', 'parts', 'processes'));
    }

    /**
     * Update Workorder in storage.
     *
     * @param \App\Http\Requests\UpdateWorkordersRequest $request
     * @param int                                        $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkordersRequest $request, $id)
    {
        if (!Gate::allows('workorder_edit')) {
            return abort(401);
        }
        $workorder = Workorder::findOrFail($id);
        $workorder->update($request->all());

        return redirect()->route('admin.workorders.index');
    }

    /**
     * Display Workorder.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('workorder_view')) {
            return abort(401);
        }
        $workorder = Workorder::findOrFail($id);

        return view('admin.workorders.show', compact('workorder'));
    }

    /**
     * Remove Workorder from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('workorder_delete')) {
            return abort(401);
        }
        $workorder = Workorder::findOrFail($id);
        $workorder->delete();

        return redirect()->route('admin.workorders.index');
    }

    /**
     * Delete all selected Workorder at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('workorder_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Workorder::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
