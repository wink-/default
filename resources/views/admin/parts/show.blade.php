@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.parts.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.parts.fields.number')</th>
                            <td field-key='number'>{{ $part->number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.description')</th>
                            <td field-key='description'>{{ $part->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.customer')</th>
                            <td field-key='customer'>{{ $part->customer->code ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.name')</th>
                            <td field-key='name'>{{ isset($part->customer) ? $part->customer->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.process')</th>
                            <td field-key='process'>{{ $part->process->code ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.processes.fields.name')</th>
                            <td field-key='name'>{{ isset($part->process) ? $part->process->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.method-code')</th>
                            <td field-key='method_code'>{{ $part->method_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.price')</th>
                            <td field-key='price'>{{ $part->price }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.price-code')</th>
                            <td field-key='price_code'>{{ $part->price_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.certify')</th>
                            <td field-key='certify'>{{ Form::checkbox("certify", 1, $part->certify == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.specification')</th>
                            <td field-key='specification'>{{ $part->specification }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.bake')</th>
                            <td field-key='bake'>{{ Form::checkbox("bake", 1, $part->bake == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.procedure-code')</th>
                            <td field-key='procedure_code'>{{ $part->procedure_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.material')</th>
                            <td field-key='material'>{{ $part->material }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.material-name')</th>
                            <td field-key='material_name'>{{ $part->material_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.material-condition')</th>
                            <td field-key='material_condition'>{{ $part->material_condition }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.thickness-minimum')</th>
                            <td field-key='thickness_minimum'>{{ $part->thickness_minimum }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.thickness-maximum')</th>
                            <td field-key='thickness_maximum'>{{ $part->thickness_maximum }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.thickness-unit-code')</th>
                            <td field-key='thickness_unit_code'>{{ $part->thickness_unit_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.surface-area')</th>
                            <td field-key='surface_area'>{{ $part->surface_area }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.surface-area-unit-code')</th>
                            <td field-key='surface_area_unit_code'>{{ $part->surface_area_unit_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.weight')</th>
                            <td field-key='weight'>{{ $part->weight }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.weight-unit-code')</th>
                            <td field-key='weight_unit_code'>{{ $part->weight_unit_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.length')</th>
                            <td field-key='length'>{{ $part->length }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.width')</th>
                            <td field-key='width'>{{ $part->width }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.height')</th>
                            <td field-key='height'>{{ $part->height }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.dimension-unit-code')</th>
                            <td field-key='dimension_unit_code'>{{ $part->dimension_unit_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.material-thickness')</th>
                            <td field-key='material_thickness'>{{ $part->material_thickness }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.material-thickness-unit-code')</th>
                            <td field-key='material_thickness_unit_code'>{{ $part->material_thickness_unit_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.special-requirement')</th>
                            <td field-key='special_requirement'>{!! $part->special_requirement !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.note')</th>
                            <td field-key='note'>{!! $part->note !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.quality-check-1')</th>
                            <td field-key='quality_check_1'>{{ $part->quality_check_1 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.quality-check-2')</th>
                            <td field-key='quality_check_2'>{{ $part->quality_check_2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.quality-check-3')</th>
                            <td field-key='quality_check_3'>{{ $part->quality_check_3 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.quality-check-4')</th>
                            <td field-key='quality_check_4'>{{ $part->quality_check_4 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.quality-check-5')</th>
                            <td field-key='quality_check_5'>{{ $part->quality_check_5 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.quality-check-6')</th>
                            <td field-key='quality_check_6'>{{ $part->quality_check_6 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.archive')</th>
                            <td field-key='archive'>{{ Form::checkbox("archive", 1, $part->archive == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.revision')</th>
                            <td field-key='revision'>{{ $part->revision }}</td>
                        </tr>
                    </table>
                </div>
            </div>
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a href="#discrepant_material" aria-controls="discrepant_material" role="tab" data-toggle="tab">Discrepant Material Report</a></li> 
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="discrepant_material">
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.parts.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
