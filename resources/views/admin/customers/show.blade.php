@extends('layouts.app')

@section('content')
    
    <h3 class="page-title">Customer: {{ $customer->name }}</h3>
    <div class="panel panel-default">

        <div class="panel-heading">
            <a href="{{ route('admin.customers.index') }}" class="btn btn-primary"><i class="fa fa-list"></i> Index</a>
            @can('customer_create')
            <a href="{{ route('admin.customers.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
            @endcan
            @can('customer_edit')
            <a href="{{ route('admin.customers.edit', ['id' => $customer->id]) }}" class="btn btn-info"><i class="fa fa-plus"></i> Edit</a> 
            @endcan
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.customer.fields.code')</th>
                            <td field-key='code'>{{ $customer->code }}</td>
                        </tr>

                        <tr>
                            <th>@lang('global.customer.fields.physical-address')</th>
                            <td field-key='physical_address'>{{ $customer->physical_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.address-extension')</th>
                            <td field-key='address_extension'>{{ $customer->address_extension }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.city')</th>
                            <td field-key='city'>{{ $customer->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.state')</th>
                            <td field-key='state'>{{ $customer->state }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.zip')</th>
                            <td field-key='zip'>{{ $customer->zip }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.company-phone')</th>
                            <td field-key='company_phone'>{{ $customer->company_phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.fax')</th>
                            <td field-key='fax'>{{ $customer->fax }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.email')</th>
                            <td field-key='email'>{{ $customer->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.contact1')</th>
                            <td field-key='contact1'>{{ $customer->contact1 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.extension1')</th>
                            <td field-key='extension1'>{{ $customer->extension1 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.contact2')</th>
                            <td field-key='contact2'>{{ $customer->contact2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.phone2')</th>
                            <td field-key='phone2'>{{ $customer->phone2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.extension2')</th>
                            <td field-key='extension2'>{{ $customer->extension2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.note')</th>
                            <td field-key='note'>{!! $customer->note !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.billing-address')</th>
                            <td field-key='billing_address'>{{ $customer->billing_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.billing-city')</th>
                            <td field-key='billing_city'>{{ $customer->billing_city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.billing-state')</th>
                            <td field-key='billing_state'>{{ $customer->billing_state }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.billing-zip')</th>
                            <td field-key='billing_zip'>{{ $customer->billing_zip }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.billing-phone')</th>
                            <td field-key='billing_phone'>{{ $customer->billing_phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.billing-fax')</th>
                            <td field-key='billing_fax'>{{ $customer->billing_fax }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.billing-email')</th>
                            <td field-key='billing_email'>{{ $customer->billing_email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.ship-to-address')</th>
                            <td field-key='ship_to_address'>{{ $customer->ship_to_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.ship-to-city')</th>
                            <td field-key='ship_to_city'>{{ $customer->ship_to_city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.ship-to-state')</th>
                            <td field-key='ship_to_state'>{{ $customer->ship_to_state }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.ship-to-zip')</th>
                            <td field-key='ship_to_zip'>{{ $customer->ship_to_zip }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.ship-to-phone')</th>
                            <td field-key='ship_to_phone'>{{ $customer->ship_to_phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.ship-to-fax')</th>
                            <td field-key='ship_to_fax'>{{ $customer->ship_to_fax }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.ship-to-email')</th>
                            <td field-key='ship_to_email'>{{ $customer->ship_to_email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.tax-id')</th>
                            <td field-key='tax_id'>{{ $customer->tax_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.cod')</th>
                            <td field-key='cod'>{{ Form::checkbox("cod", 1, $customer->cod == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.archive')</th>
                            <td field-key='archive'>{{ Form::checkbox("archive", 1, $customer->archive == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.revision')</th>
                            <td field-key='revision'>{{ $customer->revision }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#contacts" aria-controls="contacts" role="tab" data-toggle="tab">Contacts</a></li>
<li role="presentation" class=""><a href="#quotes" aria-controls="quotes" role="tab" data-toggle="tab">Quotes</a></li>
<li role="presentation" class=""><a href="#discrepant_material" aria-controls="discrepant_material" role="tab" data-toggle="tab">Discrepant Material Report</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="contacts">
<table class="table table-bordered table-striped {{ count($contacts) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.contacts.fields.customer')</th>
                        <th>@lang('global.contacts.fields.first-name')</th>
                        <th>@lang('global.contacts.fields.last-name')</th>
                        <th>@lang('global.contacts.fields.phone')</th>
                        <th>@lang('global.contacts.fields.extension')</th>
                        <th>@lang('global.contacts.fields.email')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($contacts) > 0)
            @foreach ($contacts as $contact)
                <tr data-entry-id="{{ $contact->id }}">
                    <td field-key='customer'>{{ $contact->customer->code ?? '' }}</td>
                                <td field-key='first_name'>{{ $contact->first_name }}</td>
                                <td field-key='last_name'>{{ $contact->last_name }}</td>
                                <td field-key='phone'>{{ $contact->phone }}</td>
                                <td field-key='extension'>{{ $contact->extension }}</td>
                                <td field-key='email'>{{ $contact->email }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.contacts.restore', $contact->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.contacts.perma_del', $contact->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('contact_view')
                                    <a href="{{ route('admin.contacts.show',[$contact->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('contact_edit')
                                    <a href="{{ route('admin.contacts.edit',[$contact->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('contact_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.contacts.destroy', $contact->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="quotes">
<table class="table table-bordered table-striped {{ count($quotes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.quotes.fields.customer')</th>
                        <th>Part Number</th>
                        <th>Process</th>
                        <th>Min Qty</th>
                        <th>Max Qty</th>
                        <th>Price</th>
                        <th>Min Lot</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($quotes) > 0)
            @foreach ($quotes as $quote)
                <tr data-entry-id="{{ $quote->id }}">
                    <td field-key='customer'>{{ $quote->customer->name ?? '' }}</td>
                                <td field-key='part_number'>{{ $quote->part_number }}</td>
                                <td field-key='process'>{{ $quote->process->name ?? '' }}</td>
                                <td field-key='quantity_minimum'>{{ $quote->quantity_minimum }}</td>
                                <td field-key='quantity_maximum'>{{ $quote->quantity_maximum }}</td>
                                <td field-key='price'>{{ $quote->price }}</td>
                                <td field-key='miminum_lot_charge'>{{ $quote->minimum_lot_charge }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.quotes.restore', $quote->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.quotes.perma_del', $quote->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('quote_view')
                                    <a href="{{ route('admin.quotes.show',[$quote->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('quote_edit')
                                    <a href="{{ route('admin.quotes.edit',[$quote->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('quote_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.quotes.destroy', $quote->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="41">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="discrepant_material">
<table class="table table-bordered table-striped {{ count($discrepant_materials) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.discrepant-material.fields.workorder')</th>
            <th>@lang('global.discrepant-material.fields.part-number')</th>
            <th>@lang('global.discrepant-material.fields.customer-code')</th>
            <th>@lang('global.discrepant-material.fields.process')</th>
            <th>@lang('global.discrepant-material.fields.quantity-rejected')</th>
            <th>@lang('global.discrepant-material.fields.rejection-date')</th>
            <th>@lang('global.discrepant-material.fields.rejection-type')</th>
            <th>@lang('global.discrepant-material.fields.corrective-action-due-date')</th>
            @if( request('show_deleted') == 1 )
            <th>&nbsp;</th>
            @else
            <th>&nbsp;</th>
            @endif
        </tr>
    </thead>

    <tbody>
        @if (count($discrepant_materials) > 0)
            @foreach ($discrepant_materials as $discrepant_material)
                <tr data-entry-id="{{ $discrepant_material->id }}">
                    <td field-key='workorder'>{{ $discrepant_material->workorder ?? '' }}</td>
                    <td field-key='part_number'>{{ $discrepant_material->part_number }}</td>
                    <td field-key='customer_code'>{{ $discrepant_material->customer_code }}</td>
                    <td field-key='process_code'>{{ $discrepant_material->process_code }}</td>
                    <td field-key='quantity_rejected'>{{ $discrepant_material->quantity_rejected }}</td>
                    <td field-key='rejection_date'>{{ $discrepant_material->rejection_date }}</td>
                    <td field-key='rejection_type'>{{ $discrepant_material->rejection_type }}</td>
                    <td field-key='corrective_action_due_date'>{{ $discrepant_material->corrective_action_due_date }}</td>
                    @if( request('show_deleted') == 1 )
                        <td>
                            {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'POST',
                                'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                'route' => ['admin.discrepant_materials.restore', $discrepant_material->id])) !!}
                            {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                            {!! Form::close() !!}
                                                            {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                'route' => ['admin.discrepant_materials.perma_del', $discrepant_material->id])) !!}
                            {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                            {!! Form::close() !!}
                        </td>
                    @else
                                <td>
                                    @can('quality_view')
                                    <a href="{{ route('admin.discrepant_materials.show',[$discrepant_material->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('quality_edit')
                                    <a href="{{ route('admin.discrepant_materials.edit',[$discrepant_material->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('quality_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.discrepant_materials.destroy', $discrepant_material->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="19">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
{{-- Show all parts for the customer
<div role="tabpanel" class="tab-pane " id="parts">
<table class="table table-bordered table-striped {{ count($parts) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.parts.fields.number')</th>
                        <th>@lang('global.parts.fields.description')</th>
                        <th>@lang('global.parts.fields.customer')</th>
                        <th>@lang('global.parts.fields.process')</th>
                        <th>@lang('global.parts.fields.method-code')</th>
                        <th>@lang('global.parts.fields.price')</th>
                        <th>@lang('global.parts.fields.certify')</th>
                        <th>@lang('global.parts.fields.specification')</th>
                        <th>@lang('global.parts.fields.bake')</th>
                        <th>@lang('global.parts.fields.procedure-code')</th>
                        <th>@lang('global.parts.fields.material')</th>
                        <th>@lang('global.parts.fields.material-name')</th>
                        <th>@lang('global.parts.fields.material-condition')</th>
                        <th>@lang('global.parts.fields.thickness-minimum')</th>
                        <th>@lang('global.parts.fields.thickness-maximum')</th>
                        <th>@lang('global.parts.fields.thickness-unit-code')</th>
                        <th>@lang('global.parts.fields.surface-area')</th>
                        <th>@lang('global.parts.fields.surface-area-unit-code')</th>
                        <th>@lang('global.parts.fields.weight')</th>
                        <th>@lang('global.parts.fields.weight-unit-code')</th>
                        <th>@lang('global.parts.fields.length')</th>
                        <th>@lang('global.parts.fields.width')</th>
                        <th>@lang('global.parts.fields.height')</th>
                        <th>@lang('global.parts.fields.dimension-unit-code')</th>
                        <th>@lang('global.parts.fields.material-thickness')</th>
                        <th>@lang('global.parts.fields.material-thickness-unit-code')</th>
                        <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($parts) > 0)
            @foreach ($parts as $part)
                <tr data-entry-id="{{ $part->id }}">
                    <td field-key='number'>{{ $part->number }}</td>
                                <td field-key='description'>{{ $part->description }}</td>
                                <td field-key='customer'>{{ $part->customer->code ?? '' }}</td>
                                <td field-key='process'>{{ $part->process->code ?? '' }}</td>
                                <td field-key='method_code'>{{ $part->method_code }}</td>
                                <td field-key='price'>{{ $part->price }}</td>
                                <td field-key='certify'>{{ Form::checkbox("certify", 1, $part->certify == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='specification'>{{ $part->specification }}</td>
                                <td field-key='bake'>{{ Form::checkbox("bake", 1, $part->bake == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='procedure_code'>{{ $part->procedure_code }}</td>
                                <td field-key='material'>{{ $part->material }}</td>
                                <td field-key='material_name'>{{ $part->material_name }}</td>
                                <td field-key='material_condition'>{{ $part->material_condition }}</td>
                                <td field-key='thickness_minimum'>{{ $part->thickness_minimum }}</td>
                                <td field-key='thickness_maximum'>{{ $part->thickness_maximum }}</td>
                                <td field-key='thickness_unit_code'>{{ $part->thickness_unit_code }}</td>
                                <td field-key='surface_area'>{{ $part->surface_area }}</td>
                                <td field-key='surface_area_unit_code'>{{ $part->surface_area_unit_code }}</td>
                                <td field-key='weight'>{{ $part->weight }}</td>
                                <td field-key='weight_unit_code'>{{ $part->weight_unit_code }}</td>
                                <td field-key='length'>{{ $part->length }}</td>
                                <td field-key='width'>{{ $part->width }}</td>
                                <td field-key='height'>{{ $part->height }}</td>
                                <td field-key='dimension_unit_code'>{{ $part->dimension_unit_code }}</td>
                                <td field-key='material_thickness'>{{ $part->material_thickness }}</td>
                                <td field-key='material_thickness_unit_code'>{{ $part->material_thickness_unit_code }}</td>
                                                                <td>
                                    @can('part_view')
                                    <a href="{{ route('admin.parts.show',[$part->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('part_edit')
                                    <a href="{{ route('admin.parts.edit',[$part->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('part_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.parts.destroy', $part->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="42">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div> --}}
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.customers.index') }}" class="btn btn-default">Back To Index</a>
        </div>
    </div>
@stop
