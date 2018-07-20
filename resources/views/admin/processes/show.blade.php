@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.processes.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.processes.fields.code')</th>
                            <td field-key='code'>{{ $process->code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.processes.fields.name')</th>
                            <td field-key='name'>{{ $process->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.processes.fields.minimum-lot-charge')</th>
                            <td field-key='minimum_lot_charge'>{{ $process->minimum_lot_charge }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.processes.fields.compliant-rohs')</th>
                            <td field-key='compliant_rohs'>{{ Form::checkbox("compliant_rohs", 1, $process->compliant_rohs == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.processes.fields.compliant-reach')</th>
                            <td field-key='compliant_reach'>{{ Form::checkbox("compliant_reach", 1, $process->compliant_reach == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.processes.fields.archive')</th>
                            <td field-key='archive'>{{ Form::checkbox("archive", 1, $process->archive == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#quotes" aria-controls="quotes" role="tab" data-toggle="tab">Quotes</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="quotes">
<table class="table table-bordered table-striped {{ count($quotes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.quotes.fields.customer')</th>
                        <th>@lang('global.quotes.fields.partnumber')</th>
                        <th>@lang('global.quotes.fields.process')</th>
                        <th>@lang('global.quotes.fields.quantity-minimum')</th>
                        <th>@lang('global.quotes.fields.quantity-maximum')</th>
                        <th>@lang('global.quotes.fields.price')</th>
                        <th>@lang('global.quotes.fields.miminum-lot-charge')</th>
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
                    <td field-key='customer'>{{ $quote->customer->name or '' }}</td>
                                <td field-key='partnumber'>{{ $quote->partnumber }}</td>
                                <td field-key='process'>{{ $quote->process->name or '' }}</td>
                                <td field-key='quantity_minimum'>{{ $quote->quantity_minimum }}</td>
                                <td field-key='quantity_maximum'>{{ $quote->quantity_maximum }}</td>
                                <td field-key='price'>{{ $quote->price }}</td>
                                <td field-key='miminum_lot_charge'>{{ $quote->miminum_lot_charge }}</td>
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
{{-- Show all parts for the process
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
                                <td field-key='customer'>{{ $part->customer->code or '' }}</td>
                                <td field-key='process'>{{ $part->process->code or '' }}</td>
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

            <a href="{{ route('admin.processes.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
