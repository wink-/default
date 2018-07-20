<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCustomersRequest;
use App\Http\Requests\Admin\UpdateCustomersRequest;
use Yajra\DataTables\DataTables;

class CustomersController extends Controller
{
    /**
     * Display a listing of Customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('customer_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Customer::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('customer_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'sft_customers.id',
                'sft_customers.code',
                'sft_customers.name',
                'sft_customers.physical_address',
                'sft_customers.address_extension',
                'sft_customers.city',
                'sft_customers.state',
                'sft_customers.zip',
                'sft_customers.company_phone',
                'sft_customers.fax',
                'sft_customers.email',
                'sft_customers.contact1',
                'sft_customers.extension1',
                'sft_customers.contact2',
                'sft_customers.phone2',
                'sft_customers.extension2',
                'sft_customers.note',
                'sft_customers.billing_address',
                'sft_customers.billing_city',
                'sft_customers.billing_state',
                'sft_customers.billing_zip',
                'sft_customers.billing_phone',
                'sft_customers.billing_fax',
                'sft_customers.billing_email',
                'sft_customers.ship_to_address',
                'sft_customers.ship_to_city',
                'sft_customers.ship_to_state',
                'sft_customers.ship_to_zip',
                'sft_customers.ship_to_phone',
                'sft_customers.ship_to_fax',
                'sft_customers.ship_to_email',
                'sft_customers.tax_id',
                'sft_customers.cod',
                'sft_customers.archive',
                'sft_customers.revision',
                'sft_customers.ship_to_address_code',
                'sft_customers.destination_code',
                'sft_customers.carrier_code',
            ]);

            
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'customer_';
                $routeKey = 'admin.customers';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('physical_address', function ($row) {
                return $row->physical_address ? $row->physical_address : '';
            });
            $table->editColumn('address_extension', function ($row) {
                return $row->address_extension ? $row->address_extension : '';
            });
            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : '';
            });
            $table->editColumn('state', function ($row) {
                return $row->state ? $row->state : '';
            });
            $table->editColumn('zip', function ($row) {
                return $row->zip ? $row->zip : '';
            });
            $table->editColumn('company_phone', function ($row) {
                return $row->company_phone ? $row->company_phone : '';
            });
            $table->editColumn('fax', function ($row) {
                return $row->fax ? $row->fax : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('contact1', function ($row) {
                return $row->contact1 ? $row->contact1 : '';
            });
            $table->editColumn('extension1', function ($row) {
                return $row->extension1 ? $row->extension1 : '';
            });
            $table->editColumn('contact2', function ($row) {
                return $row->contact2 ? $row->contact2 : '';
            });
            $table->editColumn('phone2', function ($row) {
                return $row->phone2 ? $row->phone2 : '';
            });
            $table->editColumn('extension2', function ($row) {
                return $row->extension2 ? $row->extension2 : '';
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });
            $table->editColumn('billing_address', function ($row) {
                return $row->billing_address ? $row->billing_address : '';
            });
            $table->editColumn('billing_city', function ($row) {
                return $row->billing_city ? $row->billing_city : '';
            });
            $table->editColumn('billing_state', function ($row) {
                return $row->billing_state ? $row->billing_state : '';
            });
            $table->editColumn('billing_zip', function ($row) {
                return $row->billing_zip ? $row->billing_zip : '';
            });
            $table->editColumn('billing_phone', function ($row) {
                return $row->billing_phone ? $row->billing_phone : '';
            });
            $table->editColumn('billing_fax', function ($row) {
                return $row->billing_fax ? $row->billing_fax : '';
            });
            $table->editColumn('billing_email', function ($row) {
                return $row->billing_email ? $row->billing_email : '';
            });
            $table->editColumn('ship_to_address', function ($row) {
                return $row->ship_to_address ? $row->ship_to_address : '';
            });
            $table->editColumn('ship_to_city', function ($row) {
                return $row->ship_to_city ? $row->ship_to_city : '';
            });
            $table->editColumn('ship_to_state', function ($row) {
                return $row->ship_to_state ? $row->ship_to_state : '';
            });
            $table->editColumn('ship_to_zip', function ($row) {
                return $row->ship_to_zip ? $row->ship_to_zip : '';
            });
            $table->editColumn('ship_to_phone', function ($row) {
                return $row->ship_to_phone ? $row->ship_to_phone : '';
            });
            $table->editColumn('ship_to_fax', function ($row) {
                return $row->ship_to_fax ? $row->ship_to_fax : '';
            });
            $table->editColumn('ship_to_email', function ($row) {
                return $row->ship_to_email ? $row->ship_to_email : '';
            });
            $table->editColumn('tax_id', function ($row) {
                return $row->tax_id ? $row->tax_id : '';
            });
            $table->editColumn('cod', function ($row) {
                return \Form::checkbox("cod", 1, $row->cod == 1, ["disabled"]);
            });
            $table->editColumn('archive', function ($row) {
                return \Form::checkbox("archive", 1, $row->archive == 1, ["disabled"]);
            });
            $table->editColumn('revision', function ($row) {
                return $row->revision ? $row->revision : '';
            });
            $table->editColumn('ship_to_address_code', function ($row) {
                return $row->ship_to_address_code ? $row->ship_to_address_code : '';
            });
            $table->editColumn('destination_code', function ($row) {
                return $row->destination_code ? $row->destination_code : '';
            });
            $table->editColumn('carrier_code', function ($row) {
                return $row->carrier_code ? $row->carrier_code : '';
            });

            $table->rawColumns(['actions','massDelete','cod','archive']);

            return $table->make(true);
        }

        return view('admin.customers.index');
    }

    /**
     * Show the form for creating new Customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('customer_create')) {
            return abort(401);
        }
        return view('admin.customers.create');
    }

    /**
     * Store a newly created Customer in storage.
     *
     * @param  \App\Http\Requests\StoreCustomersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomersRequest $request)
    {
        if (! Gate::allows('customer_create')) {
            return abort(401);
        }
        $customer = Customer::create($request->all());



        return redirect()->route('admin.customers.index');
    }


    /**
     * Show the form for editing Customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('customer_edit')) {
            return abort(401);
        }
        $customer = Customer::findOrFail($id);

        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update Customer in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomersRequest $request, $id)
    {
        if (! Gate::allows('customer_edit')) {
            return abort(401);
        }
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());



        return redirect()->route('admin.customers.index');
    }


    /**
     * Display Customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('customer_view')) {
            return abort(401);
        }
        $contacts = \App\Contact::where('customer_id', $id)->get();
        $quotes = \App\Quote::where('customer_id', $id)->get();
        //$parts = \App\Part::where('customer_id', $id)->get();        
        $customer = Customer::findOrFail($id);

        return view('admin.customers.show', compact('customer', 'contacts', 'quotes'));
    }


    /**
     * Remove Customer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('customer_delete')) {
            return abort(401);
        }
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.customers.index');
    }

    /**
     * Delete all selected Customer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('customer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Customer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Customer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('customer_delete')) {
            return abort(401);
        }
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->restore();

        return redirect()->route('admin.customers.index');
    }

    /**
     * Permanently delete Customer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('customer_delete')) {
            return abort(401);
        }
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->forceDelete();

        return redirect()->route('admin.customers.index');
    }
}
