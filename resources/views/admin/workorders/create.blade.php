@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.workorders.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.workorders.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('customer_id', trans('global.workorders.fields.customer').'', ['class' => 'control-label']) !!}
                    {!! Form::select('customer_id', $customers, old('customer_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('customer_id'))
                        <p class="help-block">
                            {{ $errors->first('customer_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('part_id', trans('global.workorders.fields.part').'', ['class' => 'control-label']) !!}
                    {!! Form::select('part_id', $parts, old('part_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('part_id'))
                        <p class="help-block">
                            {{ $errors->first('part_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('part_number', trans('global.workorders.fields.part-number').'', ['class' => 'control-label']) !!}
                    {!! Form::text('part_number', old('part_number'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('part_number'))
                        <p class="help-block">
                            {{ $errors->first('part_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('process_id', trans('global.workorders.fields.process').'', ['class' => 'control-label']) !!}
                    {!! Form::select('process_id', $processes, old('process_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('process_id'))
                        <p class="help-block">
                            {{ $errors->first('process_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', trans('global.workorders.fields.price').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('price_code', trans('global.workorders.fields.price-code').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('date_received', trans('global.workorders.fields.date-received').'', ['class' => 'control-label']) !!}
                    {!! Form::text('date_received', old('date_received'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date_received'))
                        <p class="help-block">
                            {{ $errors->first('date_received') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date_required', trans('global.workorders.fields.date-required').'', ['class' => 'control-label']) !!}
                    {!! Form::text('date_required', old('date_required'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date_required'))
                        <p class="help-block">
                            {{ $errors->first('date_required') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('customer_purchase_order', trans('global.workorders.fields.customer-purchase-order').'', ['class' => 'control-label']) !!}
                    {!! Form::text('customer_purchase_order', old('customer_purchase_order'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('customer_purchase_order'))
                        <p class="help-block">
                            {{ $errors->first('customer_purchase_order') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('customer_packing_list', trans('global.workorders.fields.customer-packing-list').'', ['class' => 'control-label']) !!}
                    {!! Form::text('customer_packing_list', old('customer_packing_list'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('customer_packing_list'))
                        <p class="help-block">
                            {{ $errors->first('customer_packing_list') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantity', trans('global.workorders.fields.quantity').'', ['class' => 'control-label']) !!}
                    {!! Form::text('quantity', old('quantity'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quantity'))
                        <p class="help-block">
                            {{ $errors->first('quantity') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('unit_code', trans('global.workorders.fields.unit-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('unit_code', old('unit_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('unit_code'))
                        <p class="help-block">
                            {{ $errors->first('unit_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantity_shipped', trans('global.workorders.fields.quantity-shipped').'', ['class' => 'control-label']) !!}
                    {!! Form::number('quantity_shipped', old('quantity_shipped'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quantity_shipped'))
                        <p class="help-block">
                            {{ $errors->first('quantity_shipped') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('destination_code', trans('global.workorders.fields.destination-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('destination_code', old('destination_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('destination_code'))
                        <p class="help-block">
                            {{ $errors->first('destination_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('carrier_code', trans('global.workorders.fields.carrier-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('carrier_code', old('carrier_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('carrier_code'))
                        <p class="help-block">
                            {{ $errors->first('carrier_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('freight_code', trans('global.workorders.fields.freight-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('freight_code', old('freight_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('freight_code'))
                        <p class="help-block">
                            {{ $errors->first('freight_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('priority', trans('global.workorders.fields.priority').'', ['class' => 'control-label']) !!}
                    {!! Form::number('priority', old('priority'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('priority'))
                        <p class="help-block">
                            {{ $errors->first('priority') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rework', trans('global.workorders.fields.rework').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('rework', 0) !!}
                    {!! Form::checkbox('rework', 1, old('rework', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rework'))
                        <p class="help-block">
                            {{ $errors->first('rework') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('hot', trans('global.workorders.fields.hot').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('hot', 0) !!}
                    {!! Form::checkbox('hot', 1, old('hot', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('hot'))
                        <p class="help-block">
                            {{ $errors->first('hot') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cod', trans('global.workorders.fields.cod').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('cod', 0) !!}
                    {!! Form::checkbox('cod', 1, old('cod', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cod'))
                        <p class="help-block">
                            {{ $errors->first('cod') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('note', trans('global.workorders.fields.note').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('note', old('note'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('note'))
                        <p class="help-block">
                            {{ $errors->first('note') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop