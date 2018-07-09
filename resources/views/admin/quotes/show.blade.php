@extends('layouts.app')

@section('content')
    <h3 class="page-title">Quote Number {{ $quote->id }} </h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('admin.quotes.index') }}" class="btn btn-primary">Back To Quotes Index</a>             
            <a href="{{action('Admin\QuotesController@downloadPDF', $quote->id)}}" class="btn btn-info"><i class="fa fa-print"></i> Quote</a>
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.quotes.fields.customer')</th>
                            <td field-key='customer'>{{ $quote->customer->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.code')</th>
                            <td field-key='code'>{{ isset($quote->customer) ? $quote->customer->code : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.contact')</th>
                            <td field-key='contact'>{{ $quote->contact->last_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.contacts.fields.first-name')</th>
                            <td field-key='first_name'>{{ isset($quote->contact) ? $quote->contact->first_name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.partnumber')</th>
                            <td field-key='partnumber'>{{ $quote->partnumber }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.partdescription')</th>
                            <td field-key='partdescription'>{{ $quote->partdescription }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.process')</th>
                            <td field-key='process'>{{ $quote->process->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.processes.fields.code')</th>
                            <td field-key='code'>{{  $quote->process->code or  '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.specification')</th>
                            <td field-key='specification'>{{ $quote->specification }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.material')</th>
                            <td field-key='material'>{{ $quote->material }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.method')</th>
                            <td field-key='method'>{{ $quote->method }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.quantity-minimum')</th>
                            <td field-key='quantity_minimum'>{{ $quote->quantity_minimum }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.quantity-maximum')</th>
                            <td field-key='quantity_maximum'>{{ $quote->quantity_maximum }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.price')</th>
                            <td field-key='price'>{{ $quote->price }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.units')</th>
                            <td field-key='units'>{{ $quote->units }}</td>
                        </tr>
                        <tr>
                            <th>Minimum Lot Charge</th>
                            <td field-key='minimum_lot_charge'>{{ $quote->minimum_lot_charge }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.quantity-price-break')</th>
                            <td field-key='quantity_price_break'>{{ $quote->quantity_price_break }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.price-break')</th>
                            <td field-key='price_break'>{{ $quote->price_break }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.thickness-minimum')</th>
                            <td field-key='thickness_minimum'>{{ $quote->thickness_minimum }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.thickness-maximum')</th>
                            <td field-key='thickness_maximum'>{{ $quote->thickness_maximum }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.weight')</th>
                            <td field-key='weight'>{{ $quote->weight }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.surface-area')</th>
                            <td field-key='surface_area'>{{ $quote->surface_area }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.baking-time-pre')</th>
                            <td field-key='baking_time_pre'>{{ $quote->baking_time_pre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.baking-temp-pre')</th>
                            <td field-key='baking_temp_pre'>{{ $quote->baking_temp_pre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.baking-time-post')</th>
                            <td field-key='baking_time_post'>{{ $quote->baking_time_post }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.baking-temp-post')</th>
                            <td field-key='baking_temp_post'>{{ $quote->baking_temp_post }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.bake-notes')</th>
                            <td field-key='bake_notes'>{{ $quote->bake_notes }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.blasting')</th>
                            <td field-key='blasting'>{{ Form::checkbox("blasting", 1, $quote->blasting == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.blast-notes')</th>
                            <td field-key='blast_notes'>{{ $quote->blast_notes }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.masking')</th>
                            <td field-key='masking'>{{ Form::checkbox("masking", 1, $quote->masking == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.mask-notes')</th>
                            <td field-key='mask_notes'>{{ $quote->mask_notes }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.testing')</th>
                            <td field-key='testing'>{{ Form::checkbox("testing", 1, $quote->testing == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.testing-note')</th>
                            <td field-key='testing_note'>{{ $quote->testing_note }}</td>
                        </tr>
                        <tr>
                            <th>Print</th>
                            <td field-key='print'>
                              @if(file_exists( public_path().'/quotes/'.$quote->id.'.pdf' ))
                                <a href="{{ asset(env('UPLOAD_PATH').'/quotes/' . $quote->id.'.pdf') }}" target="_blank">Download file</a>
                              @else
                                No Print
                              @endif
                                </td>                          

                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.notes')</th>
                            <td field-key='notes'>{!! $quote->notes !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.comments')</th>
                            <td field-key='comments'>{!! $quote->comments !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.quotes.fields.user')</th>
                            <td field-key='user'>{{ $quote->user->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.quotes.index') }}" class="btn btn-default">Back To Quotes Index</a>
        </div>
    </div>
@stop
