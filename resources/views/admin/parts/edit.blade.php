@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.parts.title')</h3>
    
    {!! Form::model($part, ['method' => 'PUT', 'route' => ['admin.parts.update', $part->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('number', trans('global.parts.fields.number').'', ['class' => 'control-label']) !!}
                    {!! Form::text('number', old('number'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('number'))
                        <p class="help-block">
                            {{ $errors->first('number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('global.parts.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('customer_code', trans('global.parts.fields.customer').'', ['class' => 'control-label']) !!}
                    {!! Form::select('customer_code', $customers, old('customer_code'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('customer_code'))
                        <p class="help-block">
                            {{ $errors->first('customer_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('process_code', trans('global.parts.fields.process').'', ['class' => 'control-label']) !!}
                    {!! Form::select('process_code', $processes, old('process_code'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('process_code'))
                        <p class="help-block">
                            {{ $errors->first('process_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('method_code', trans('global.parts.fields.method-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('method_code', old('method_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('method_code'))
                        <p class="help-block">
                            {{ $errors->first('method_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', trans('global.parts.fields.price').'', ['class' => 'control-label']) !!}
                    {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price_code', trans('global.parts.fields.price-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('price_code', old('price_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price_code'))
                        <p class="help-block">
                            {{ $errors->first('price_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('certify', trans('global.parts.fields.certify').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('certify', 0) !!}
                    {!! Form::checkbox('certify', 1, old('certify', old('certify')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('certify'))
                        <p class="help-block">
                            {{ $errors->first('certify') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('specification', trans('global.parts.fields.specification').'', ['class' => 'control-label']) !!}
                    {!! Form::text('specification', old('specification'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('specification'))
                        <p class="help-block">
                            {{ $errors->first('specification') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bake', trans('global.parts.fields.bake').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('bake', 0) !!}
                    {!! Form::checkbox('bake', 1, old('bake', old('bake')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bake'))
                        <p class="help-block">
                            {{ $errors->first('bake') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('procedure_code', trans('global.parts.fields.procedure-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('procedure_code', old('procedure_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('procedure_code'))
                        <p class="help-block">
                            {{ $errors->first('procedure_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('material', trans('global.parts.fields.material').'', ['class' => 'control-label']) !!}
                    {!! Form::text('material', old('material'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('material'))
                        <p class="help-block">
                            {{ $errors->first('material') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('material_name', trans('global.parts.fields.material-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('material_name', old('material_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('material_name'))
                        <p class="help-block">
                            {{ $errors->first('material_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('material_condition', trans('global.parts.fields.material-condition').'', ['class' => 'control-label']) !!}
                    {!! Form::text('material_condition', old('material_condition'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('material_condition'))
                        <p class="help-block">
                            {{ $errors->first('material_condition') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('thickness_minimum', trans('global.parts.fields.thickness-minimum').'', ['class' => 'control-label']) !!}
                    {!! Form::text('thickness_minimum', old('thickness_minimum'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('thickness_minimum'))
                        <p class="help-block">
                            {{ $errors->first('thickness_minimum') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('thickness_maximum', trans('global.parts.fields.thickness-maximum').'', ['class' => 'control-label']) !!}
                    {!! Form::text('thickness_maximum', old('thickness_maximum'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('thickness_maximum'))
                        <p class="help-block">
                            {{ $errors->first('thickness_maximum') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('thickness_unit_code', trans('global.parts.fields.thickness-unit-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('thickness_unit_code', old('thickness_unit_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('thickness_unit_code'))
                        <p class="help-block">
                            {{ $errors->first('thickness_unit_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('surface_area', trans('global.parts.fields.surface-area').'', ['class' => 'control-label']) !!}
                    {!! Form::text('surface_area', old('surface_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('surface_area'))
                        <p class="help-block">
                            {{ $errors->first('surface_area') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('surface_area_unit_code', trans('global.parts.fields.surface-area-unit-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('surface_area_unit_code', old('surface_area_unit_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('surface_area_unit_code'))
                        <p class="help-block">
                            {{ $errors->first('surface_area_unit_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('weight', trans('global.parts.fields.weight').'', ['class' => 'control-label']) !!}
                    {!! Form::text('weight', old('weight'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('weight'))
                        <p class="help-block">
                            {{ $errors->first('weight') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('weight_unit_code', trans('global.parts.fields.weight-unit-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('weight_unit_code', old('weight_unit_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('weight_unit_code'))
                        <p class="help-block">
                            {{ $errors->first('weight_unit_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('length', trans('global.parts.fields.length').'', ['class' => 'control-label']) !!}
                    {!! Form::text('length', old('length'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('length'))
                        <p class="help-block">
                            {{ $errors->first('length') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('width', trans('global.parts.fields.width').'', ['class' => 'control-label']) !!}
                    {!! Form::text('width', old('width'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('width'))
                        <p class="help-block">
                            {{ $errors->first('width') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('height', trans('global.parts.fields.height').'', ['class' => 'control-label']) !!}
                    {!! Form::text('height', old('height'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('height'))
                        <p class="help-block">
                            {{ $errors->first('height') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dimension_unit_code', trans('global.parts.fields.dimension-unit-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dimension_unit_code', old('dimension_unit_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dimension_unit_code'))
                        <p class="help-block">
                            {{ $errors->first('dimension_unit_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('material_thickness', trans('global.parts.fields.material-thickness').'', ['class' => 'control-label']) !!}
                    {!! Form::text('material_thickness', old('material_thickness'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('material_thickness'))
                        <p class="help-block">
                            {{ $errors->first('material_thickness') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('material_thickness_unit_code', trans('global.parts.fields.material-thickness-unit-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('material_thickness_unit_code', old('material_thickness_unit_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('material_thickness_unit_code'))
                        <p class="help-block">
                            {{ $errors->first('material_thickness_unit_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('special_requirement', trans('global.parts.fields.special-requirement').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('special_requirement', old('special_requirement'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('special_requirement'))
                        <p class="help-block">
                            {{ $errors->first('special_requirement') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('note', trans('global.parts.fields.note').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('note', old('note'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('note'))
                        <p class="help-block">
                            {{ $errors->first('note') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quality_check_1', trans('global.parts.fields.quality-check-1').'', ['class' => 'control-label']) !!}
                    {!! Form::number('quality_check_1', old('quality_check_1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quality_check_1'))
                        <p class="help-block">
                            {{ $errors->first('quality_check_1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quality_check_2', trans('global.parts.fields.quality-check-2').'', ['class' => 'control-label']) !!}
                    {!! Form::number('quality_check_2', old('quality_check_2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quality_check_2'))
                        <p class="help-block">
                            {{ $errors->first('quality_check_2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quality_check_3', trans('global.parts.fields.quality-check-3').'', ['class' => 'control-label']) !!}
                    {!! Form::number('quality_check_3', old('quality_check_3'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quality_check_3'))
                        <p class="help-block">
                            {{ $errors->first('quality_check_3') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quality_check_4', trans('global.parts.fields.quality-check-4').'', ['class' => 'control-label']) !!}
                    {!! Form::number('quality_check_4', old('quality_check_4'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quality_check_4'))
                        <p class="help-block">
                            {{ $errors->first('quality_check_4') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quality_check_5', trans('global.parts.fields.quality-check-5').'', ['class' => 'control-label']) !!}
                    {!! Form::number('quality_check_5', old('quality_check_5'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quality_check_5'))
                        <p class="help-block">
                            {{ $errors->first('quality_check_5') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quality_check_6', trans('global.parts.fields.quality-check-6').'', ['class' => 'control-label']) !!}
                    {!! Form::number('quality_check_6', old('quality_check_6'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quality_check_6'))
                        <p class="help-block">
                            {{ $errors->first('quality_check_6') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('archive', trans('global.parts.fields.archive').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('archive', 0) !!}
                    {!! Form::checkbox('archive', 1, old('archive', old('archive')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('archive'))
                        <p class="help-block">
                            {{ $errors->first('archive') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('revision', trans('global.parts.fields.revision').'', ['class' => 'control-label']) !!}
                    {!! Form::number('revision', old('revision'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('revision'))
                        <p class="help-block">
                            {{ $errors->first('revision') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

