<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContactsRequest;
use App\Http\Requests\Admin\UpdateContactsRequest;
use Yajra\DataTables\DataTables;

class ContactsController extends Controller
{
    /**
     * Display a listing of Contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('contact_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Contact::query();
            $query->with("customer");
            $template = 'actionsTemplate';
            if (request('show_deleted') == 1) {
                if (! Gate::allows('contact_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'sft_contacts.id',
                'sft_contacts.customer_id',
                'sft_contacts.first_name',
                'sft_contacts.last_name',
                'sft_contacts.phone',
                'sft_contacts.extension',
                'sft_contacts.email',
                'sft_contacts.archive',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'contact_';
                $routeKey = 'admin.contacts';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('customer.code', function ($row) {
                return $row->customer ? $row->customer->code : '';
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('extension', function ($row) {
                return $row->extension ? $row->extension : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('archive', function ($row) {
                return \Form::checkbox("archive", 1, $row->archive == 1, ["disabled"]);
            });

            $table->rawColumns(['actions','massDelete','archive']);

            return $table->make(true);
        }

        return view('admin.contacts.index');
    }

    /**
     * Show the form for creating new Contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('contact_create')) {
            return abort(401);
        }
        
        $customers = \App\Customer::get()->pluck('code', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.contacts.create', compact('customers'));
    }

    /**
     * Store a newly created Contact in storage.
     *
     * @param  \App\Http\Requests\StoreContactsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactsRequest $request)
    {
        if (! Gate::allows('contact_create')) {
            return abort(401);
        }
        $contact = Contact::create($request->all());



        return redirect()->route('admin.contacts.index');
    }


    /**
     * Show the form for editing Contact.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('contact_edit')) {
            return abort(401);
        }
        
        $customers = \App\Customer::get()->pluck('code', 'id')->prepend(trans('global.app_please_select'), '');

        $contact = Contact::findOrFail($id);

        return view('admin.contacts.edit', compact('contact', 'customers'));
    }

    /**
     * Update Contact in storage.
     *
     * @param  \App\Http\Requests\UpdateContactsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactsRequest $request, $id)
    {
        if (! Gate::allows('contact_edit')) {
            return abort(401);
        }
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());



        return redirect()->route('admin.contacts.index');
    }


    /**
     * Display Contact.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('contact_view')) {
            return abort(401);
        }
        
        $customers = \App\Customer::get()->pluck('code', 'id')->prepend(trans('global.app_please_select'), '');
        $quotes = \App\Quote::where('contact_id', $id)->get();

        $contact = Contact::findOrFail($id);

        return view('admin.contacts.show', compact('contact', 'quotes'));
    }


    /**
     * Remove Contact from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('contact_delete')) {
            return abort(401);
        }
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts.index');
    }

    /**
     * Delete all selected Contact at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('contact_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Contact::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Contact from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('contact_delete')) {
            return abort(401);
        }
        $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->restore();

        return redirect()->route('admin.contacts.index');
    }

    /**
     * Permanently delete Contact from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('contact_delete')) {
            return abort(401);
        }
        $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->forceDelete();

        return redirect()->route('admin.contacts.index');
    }
}
