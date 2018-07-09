@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.processes.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.processes.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('code', trans('global.processes.fields.code').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('code', old('code'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('code'))
                        <p class="help-block">
                            {{ $errors->first('code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('global.processes.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('minimum_lot_charge', trans('global.processes.fields.minimum-lot-charge').'', ['class' => 'control-label']) !!}
                    {!! Form::text('minimum_lot_charge', old('minimum_lot_charge'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('minimum_lot_charge'))
                        <p class="help-block">
                            {{ $errors->first('minimum_lot_charge') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('compliant_rohs', trans('global.processes.fields.compliant-rohs').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('compliant_rohs', 0) !!}
                    {!! Form::checkbox('compliant_rohs', 1, old('compliant_rohs', true), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('compliant_rohs'))
                        <p class="help-block">
                            {{ $errors->first('compliant_rohs') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('compliant_reach', trans('global.processes.fields.compliant-reach').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('compliant_reach', 0) !!}
                    {!! Form::checkbox('compliant_reach', 1, old('compliant_reach', true), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('compliant_reach'))
                        <p class="help-block">
                            {{ $errors->first('compliant_reach') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

