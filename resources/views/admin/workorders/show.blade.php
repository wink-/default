@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.workorders.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.workorders.fields.number')</th>
                            <td field-key='number'>{{ $workorder->number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.customer')</th>
                            <td field-key='customer'>{{ $workorder->customer->code or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.name')</th>
                            <td field-key='name'>{{ isset($workorder->customer) ? $workorder->customer->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.part')</th>
                            <td field-key='part'>{{ $workorder->part->number or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.part-number')</th>
                            <td field-key='part_number'>{{ $workorder->part_number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.process')</th>
                            <td field-key='process'>{{ $workorder->process->code or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.price')</th>
                            <td field-key='price'>{{ $workorder->price }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.price-code')</th>
                            <td field-key='price_code'>{{ $workorder->price_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.date-received')</th>
                            <td field-key='date_received'>{{ $workorder->date_received }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.date-required')</th>
                            <td field-key='date_required'>{{ $workorder->date_required }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.customer-purchase-order')</th>
                            <td field-key='customer_purchase_order'>{{ $workorder->customer_purchase_order }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.customer-packing-list')</th>
                            <td field-key='customer_packing_list'>{{ $workorder->customer_packing_list }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.quantity')</th>
                            <td field-key='quantity'>{{ $workorder->quantity }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.unit-code')</th>
                            <td field-key='unit_code'>{{ $workorder->unit_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.quantity-shipped')</th>
                            <td field-key='quantity_shipped'>{{ $workorder->quantity_shipped }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.our-last-packing-list')</th>
                            <td field-key='our_last_packing_list'>{{ $workorder->our_last_packing_list }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.destination-code')</th>
                            <td field-key='destination_code'>{{ $workorder->destination_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.carrier-code')</th>
                            <td field-key='carrier_code'>{{ $workorder->carrier_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.freight-code')</th>
                            <td field-key='freight_code'>{{ $workorder->freight_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.date-shipped')</th>
                            <td field-key='date_shipped'>{{ $workorder->date_shipped }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.invoice-number')</th>
                            <td field-key='invoice_number'>{{ $workorder->invoice_number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.invoice-date')</th>
                            <td field-key='invoice_date'>{{ $workorder->invoice_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.invoice-amount')</th>
                            <td field-key='invoice_amount'>{{ $workorder->invoice_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.priority')</th>
                            <td field-key='priority'>{{ $workorder->priority }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.rework')</th>
                            <td field-key='rework'>{{ Form::checkbox("rework", 1, $workorder->rework == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.hot')</th>
                            <td field-key='hot'>{{ Form::checkbox("hot", 1, $workorder->hot == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.started')</th>
                            <td field-key='started'>{{ Form::checkbox("started", 1, $workorder->started == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.completed')</th>
                            <td field-key='completed'>{{ Form::checkbox("completed", 1, $workorder->completed == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.shipped')</th>
                            <td field-key='shipped'>{{ Form::checkbox("shipped", 1, $workorder->shipped == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.cod')</th>
                            <td field-key='cod'>{{ Form::checkbox("cod", 1, $workorder->cod == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.invoiced')</th>
                            <td field-key='invoiced'>{{ Form::checkbox("invoiced", 1, $workorder->invoiced == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.note')</th>
                            <td field-key='note'>{!! $workorder->note !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.session-id')</th>
                            <td field-key='session_id'>{{ $workorder->session_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.workorders.fields.revision')</th>
                            <td field-key='revision'>{{ $workorder->revision }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.workorders.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
