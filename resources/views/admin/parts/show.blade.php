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
                            <td field-key='customer'>{{ $part->customer->code or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.name')</th>
                            <td field-key='name'>{{ isset($part->customer) ? $part->customer->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.parts.fields.process')</th>
                            <td field-key='process'>{{ $part->process->code or '' }}</td>
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.parts.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
