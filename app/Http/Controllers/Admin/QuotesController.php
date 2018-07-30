<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreQuotesRequest;
use App\Http\Requests\Admin\UpdateQuotesRequest;
//use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\QuoteUploadTrait;
use Yajra\DataTables\DataTables;
use PDF;

class QuotesController extends Controller
{
    //use FileUploadTrait;
    use QuoteUploadTrait;
    /**
     * Display a listing of Quote.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('quote_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Quote::query();
            $query->with("customer");
            $query->with("contact");
            $query->with("process");
            $query->with("user");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('quote_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'sft_quotes.id',
                'sft_quotes.customer_id',
                'sft_quotes.contact_id',
                'sft_quotes.partnumber',
                'sft_quotes.partdescription',
                'sft_quotes.process_id',
                'sft_quotes.specification',
                'sft_quotes.material',
                'sft_quotes.method',
                'sft_quotes.quantity_minimum',
                'sft_quotes.quantity_maximum',
                'sft_quotes.price',
                'sft_quotes.units',
                'sft_quotes.minimum_lot_charge',
                'sft_quotes.quantity_price_break',
                'sft_quotes.price_break',
                'sft_quotes.thickness_minimum',
                'sft_quotes.thickness_maximum',
                'sft_quotes.weight',
                'sft_quotes.surface_area',
                'sft_quotes.baking_time_pre',
                'sft_quotes.baking_temp_pre',
                'sft_quotes.baking_time_post',
                'sft_quotes.baking_temp_post',
                'sft_quotes.bake_notes',
                'sft_quotes.blasting',
                'sft_quotes.blast_notes',
                'sft_quotes.masking',
                'sft_quotes.mask_notes',
                'sft_quotes.testing',
                'sft_quotes.testing_note',
                'sft_quotes.print',
                'sft_quotes.notes',
                'sft_quotes.comments',
                'sft_quotes.user_id',
                'sft_quotes.archive',
                'sft_quotes.revision',
                'sft_quotes.created_at',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'quote_';
                $routeKey = 'admin.quotes';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('customer.name', function ($row) {
                return $row->customer ? $row->customer->name : '';
            });
            $table->editColumn('contact.last_name', function ($row) {
                return $row->contact ? $row->contact->last_name : '';
            });
            $table->editColumn('partnumber', function ($row) {
                return $row->partnumber ? $row->partnumber : '';
            });
            $table->editColumn('partdescription', function ($row) {
                return $row->partdescription ? $row->partdescription : '';
            });
            $table->editColumn('process.name', function ($row) {
                return $row->process ? $row->process->name : '';
            });
            $table->editColumn('specification', function ($row) {
                return $row->specification ? $row->specification : '';
            });
            $table->editColumn('method', function ($row) {
                return $row->method ? $row->method : '';
            });
            $table->editColumn('quantity_minimum', function ($row) {
                return $row->quantity_minimum ? $row->quantity_minimum : '';
            });
            $table->editColumn('quantity_maximum', function ($row) {
                return $row->quantity_maximum ? $row->quantity_maximum : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('minimum_lot_charge', function ($row) {
                return $row->minimum_lot_charge ? $row->minimum_lot_charge : '';
            });
            $table->editColumn('quantity_price_break', function ($row) {
                return $row->quantity_price_break ? $row->quantity_price_break : '';
            });
            $table->editColumn('price_break', function ($row) {
                return $row->price_break ? $row->price_break : '';
            });
            $table->editColumn('thickness_minimum', function ($row) {
                return $row->thickness_minimum ? $row->thickness_minimum : '';
            });
            $table->editColumn('thickness_maximum', function ($row) {
                return $row->thickness_maximum ? $row->thickness_maximum : '';
            });
            $table->editColumn('weight', function ($row) {
                return $row->weight ? $row->weight : '';
            });
            $table->editColumn('surface_area', function ($row) {
                return $row->surface_area ? $row->surface_area : '';
            });
            $table->editColumn('baking_time_pre', function ($row) {
                return $row->baking_time_pre ? $row->baking_time_pre : '';
            });
            $table->editColumn('baking_temp_pre', function ($row) {
                return $row->baking_temp_pre ? $row->baking_temp_pre : '';
            });
            $table->editColumn('baking_time_post', function ($row) {
                return $row->baking_time_post ? $row->baking_time_post : '';
            });
            $table->editColumn('baking_temp_post', function ($row) {
                return $row->baking_temp_post ? $row->baking_temp_post : '';
            });
            $table->editColumn('bake_notes', function ($row) {
                return $row->bake_notes ? $row->bake_notes : '';
            });
            $table->editColumn('blasting', function ($row) {
                return \Form::checkbox("blasting", 1, $row->blasting == 1, ["disabled"]);
            });
            $table->editColumn('blast_notes', function ($row) {
                return $row->blast_notes ? $row->blast_notes : '';
            });
            $table->editColumn('masking', function ($row) {
                return \Form::checkbox("masking", 1, $row->masking == 1, ["disabled"]);
            });
            $table->editColumn('mask_notes', function ($row) {
                return $row->mask_notes ? $row->mask_notes : '';
            });
            $table->editColumn('testing', function ($row) {
                return \Form::checkbox("testing", 1, $row->testing == 1, ["disabled"]);
            });
            $table->editColumn('testing_note', function ($row) {
                return $row->testing_note ? $row->testing_note : '';
            });
            $table->editColumn('print', function ($row) {
                if($row->print) { return '<a href="'.asset(env('UPLOAD_PATH').'/'.$row->print) .'" target="_blank">Download file</a>'; };
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : '';
            });
            $table->editColumn('user.name', function ($row) {
                return $row->user ? $row->user->name : '';
            });
            $table->editColumn('archive', function ($row) {
                return \Form::checkbox("archive", 1, $row->archive == 1, ["disabled"]);
            });
            $table->editColumn('revision', function ($row) {
                return $row->revision ? $row->revision : '';
            });
            $table->editColumn('created_at', function ($row) {
                return $row->created_at->format('Y-m-d');
            });

            $table->rawColumns(['actions','massDelete','blasting','masking','testing','print','archive']);

            return $table->make(true);
        }

        $quotes = \App\Quote::where('created_at', '>', Carbon::today()->subDays(30))->get();
        $quoted = [$quotes->where('created_at', '>', Carbon::now()->startOfDay())->sum('value_min'), 
                   $quotes->sum('value_min'),
                   $quotes->where('created_at', '>', Carbon::now()->startOfDay())->sum('value_max'),
                   $quotes->sum('value_max')];

        return view('admin.quotes.index', compact('quoted'));
    }

    /**
     * Show the form for creating new Quote.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('quote_create')) {
            return abort(401);
        }
        
        $customers = \App\Customer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $contacts = \App\Contact::get()->pluck('full_name', 'id')->prepend('Please Select');
        $processes = \App\Process::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_method = Quote::$enum_method;
        $enum_units = Quote::$enum_units;
            
        return view('admin.quotes.create', compact('enum_method', 'enum_units', 'customers', 'contacts', 'processes'));
    }

    /**
     * Store a newly created Quote in storage.
     *
     * @param  \App\Http\Requests\StoreQuotesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuotesRequest $request)
    {
        if (! Gate::allows('quote_create')) {
            return abort(401);
        }
        switch ($request->units) {
            case "each":
                $value_min = $request->quantity_minimum * $request->price;
                $value_max = $request->quantity_maximum * $request->price;
                break;
            case "sets":
                $value_min = $request->quantity_minimum * $request->price;
                $value_max = $request->quantity_maximum * $request->price;
                break;
            case "pound":
                $value_min = $request->quantity_minimum * $request->price;
                $value_max = $request->quantity_maximum * $request->price;
                break;
            case "foot":
                $value_min = $request->quantity_minimum * $request->price;
                $value_max = $request->quantity_maximum * $request->price;
                break;                
            case "inch":
                $value_min = $request->quantity_minimum * $request->price;
                $value_max = $request->quantity_maximum * $request->price;
                break;
            case "thousand":
                $value_min = $request->quantity_minimum * $request->price * 0.001;
                $value_max = $request->quantity_maximum * $request->price * 0.001;
                break;
            case "lot":
                $value_min = $request->price;
                $value_max = $request->price;
                break;                
        }

        if ($value_min < $request->minimum_lot_charge) {
            $value_min = $request->minimum_lot_charge;
        }
        if ($value_max < $request->minimum_lot_charge) {
            $value_max = $request->minimum_lot_charge;
            if ($value_max < $value_min) {
                $value_max = $value_min;
            }
        }

        $request->request->add(['value_min' => $value_min]);
        $request->request->add(['value_max' => $value_max]);
        $request->request->add(['user_id' => Auth::User()->id]);
        $quote = Quote::create($request->all());
        $request = $this->saveFiles($request, $quote->id);
        //return redirect()->route('admin.quotes.show', ['id' => $quote->id]);
        return redirect()->route('admin.quotes.print', ['id' => $quote->id]);        
    }


    /**
     * Show the form for editing Quote.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('quote_edit')) {
            return abort(401);
        }
        
        $customers = \App\Customer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $contacts = \App\Contact::get()->pluck('last_name', 'id')->prepend(trans('global.app_please_select'), '');
        $processes = \App\Process::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_method = Quote::$enum_method;
        $enum_units = Quote::$enum_units;
            
        $quote = Quote::findOrFail($id);

        return view('admin.quotes.edit', compact('quote', 'enum_method', 'enum_units', 'customers', 'contacts', 'processes'));
    }

    /**
     * Update Quote in storage.
     *
     * @param  \App\Http\Requests\UpdateQuotesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuotesRequest $request, $id)
    {
        if (! Gate::allows('quote_edit')) {
            return abort(401);
        }
        switch ($request->units) {
            case "each":
                $value_min = $request->quantity_minimum * $request->price;
                $value_max = $request->quantity_maximum * $request->price;
                break;
            case "sets":
                $value_min = $request->quantity_minimum * $request->price;
                $value_max = $request->quantity_maximum * $request->price;
                break;
            case "pound":
                $value_min = $request->quantity_minimum * $request->price;
                $value_max = $request->quantity_maximum * $request->price;
                break;
            case "foot":
                $value_min = $request->quantity_minimum * $request->price;
                $value_max = $request->quantity_maximum * $request->price;
                break;                
            case "inch":
                $value_min = $request->quantity_minimum * $request->price;
                $value_max = $request->quantity_maximum * $request->price;
                break;
            case "thousand":
                $value_min = $request->quantity_minimum * $request->price * 0.001;
                $value_max = $request->quantity_maximum * $request->price * 0.001;
                break;
            case "lot":
                $value_min = $request->price;
                $value_max = $request->price;
                break;                
        }

        if ($value_min < $request->minimum_lot_charge) {
            $value_min = $request->minimum_lot_charge;
        }
        if ($value_max < $request->minimum_lot_charge) {
            $value_max = $request->minimum_lot_charge;
            if ($value_max < $value_min) {
                $value_max = $value_min;
            }
        }

        $request->request->add(['value_min' => $value_min]);
        $request->request->add(['value_max' => $value_max]);
        $request->request->add(['user_id' => Auth::User()->id]);        

        $quote = Quote::findOrFail($id);
        $quote->update($request->all());
        $request = $this->saveFiles($request, $quote->id);



        //return redirect()->route('admin.quotes.index');
        //return redirect()->route('admin.quotes.show', ['id' => $quote->id]);
        return redirect()->route('admin.quotes.print', ['id' => $quote->id]);
    }


    /**
     * Display Quote.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('quote_view')) {
            return abort(401);
        }
        $quote = Quote::findOrFail($id);

        return view('admin.quotes.show', compact('quote'));
    }

    /**
     * Generate a downloadable PDF for the quote.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF($id){
      $quote = Quote::find($id);
      PDF::setOptions(['defaultPaperSize' => "letter"]);
      $pdf = PDF::loadView('admin.quotes.pdf', compact('quote'));
      return view('admin.quotes.pdf', compact('quote'));
      //return $pdf->download('Surface Finish Quote '.$quote->id.'.pdf');

    }

    /**
     * Remove Quote from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('quote_delete')) {
            return abort(401);
        }
        $quote = Quote::findOrFail($id);
        $quote->delete();

        return redirect()->route('admin.quotes.index');
    }

    /**
     * Delete all selected Quote at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('quote_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Quote::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Quote from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('quote_delete')) {
            return abort(401);
        }
        $quote = Quote::onlyTrashed()->findOrFail($id);
        $quote->restore();

        return redirect()->route('admin.quotes.index');
    }

    /**
     * Permanently delete Quote from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('quote_delete')) {
            return abort(401);
        }
        $quote = Quote::onlyTrashed()->findOrFail($id);
        $quote->forceDelete();

        return redirect()->route('admin.quotes.index');
    }
}
