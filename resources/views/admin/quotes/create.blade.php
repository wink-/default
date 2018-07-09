@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.quotes.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.quotes.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('customer_id', 'Customer*', ['class' => 'control-label']) !!}
                    {!! Form::select('customer_id', $customers, old('customer_id'), ['class' => 'form-control select2', 'required' => '']) !!}
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
                    {!! Form::label('contact_id', 'Contact', ['class' => 'control-label']) !!}
                    {!! Form::select('contact_id', $contacts, old('contact_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('contact_id'))
                        <p class="help-block">
                            {{ $errors->first('contact_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('partnumber', 'Part Number*', ['class' => 'control-label']) !!}
                    {!! Form::text('partnumber', old('partnumber'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('partnumber'))
                        <p class="help-block">
                            {{ $errors->first('partnumber') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('partdescription', 'Part Description', ['class' => 'control-label']) !!}
                    {!! Form::text('partdescription', old('partdescription'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('partdescription'))
                        <p class="help-block">
                            {{ $errors->first('partdescription') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('process_id', 'Process*', ['class' => 'control-label']) !!}
                    {!! Form::select('process_id', $processes, old('process_id'), ['class' => 'form-control select2', 'required' => '']) !!}
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
                    {!! Form::label('specification', 'Specification', ['class' => 'control-label']) !!}
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
                    {!! Form::label('material', 'Material*', ['class' => 'control-label']) !!}
                    {!! Form::text('material', old('material'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::label('method', 'Method*', ['class' => 'control-label']) !!}
                    {!! Form::select('method', $enum_method, old('method'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('method'))
                        <p class="help-block">
                            {{ $errors->first('method') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantity_minimum', 'Quantity Min*', ['class' => 'control-label']) !!}
                    {!! Form::number('quantity_minimum', old('quantity_minimum'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quantity_minimum'))
                        <p class="help-block">
                            {{ $errors->first('quantity_minimum') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantity_maximum', 'Quantity Max', ['class' => 'control-label']) !!}
                    {!! Form::number('quantity_maximum', old('quantity_maximum'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quantity_maximum'))
                        <p class="help-block">
                            {{ $errors->first('quantity_maximum') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', 'Price*', ['class' => 'control-label']) !!}
                    {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::label('units', 'Units*', ['class' => 'control-label']) !!}
                    {!! Form::select('units', $enum_units, old('units'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('units'))
                        <p class="help-block">
                            {{ $errors->first('units') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('minimum_lot_charge', 'Minimum Lot Charge*', ['class' => 'control-label']) !!}
                    {!! Form::text('minimum_lot_charge', old('minimum_lot_charge'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::label('quantity_price_break', 'Quantity Price Break', ['class' => 'control-label']) !!}
                    {!! Form::number('quantity_price_break', old('quantity_price_break'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quantity_price_break'))
                        <p class="help-block">
                            {{ $errors->first('quantity_price_break') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price_break', 'Price Break ', ['class' => 'control-label']) !!}
                    {!! Form::text('price_break', old('price_break'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price_break'))
                        <p class="help-block">
                            {{ $errors->first('price_break') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('thickness_minimum', 'Thickness Min', ['class' => 'control-label']) !!}
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
                    {!! Form::label('thickness_maximum', 'Thickness Max', ['class' => 'control-label']) !!}
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
                    {!! Form::label('weight', 'Weight', ['class' => 'control-label']) !!}
                    {!! Form::text('weight', old('weight'), ['class' => 'form-control', 'placeholder' => 'Weight Each in pounds']) !!}
                    <p class="help-block">Weight Each in pounds</p>
                    @if($errors->has('weight'))
                        <p class="help-block">
                            {{ $errors->first('weight') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('surface_area', 'Surface Area', ['class' => 'control-label']) !!}
                    {!! Form::text('surface_area', old('surface_area'), ['class' => 'form-control', 'placeholder' => 'square inches']) !!}
                    <p class="help-block">square inches</p>
                    @if($errors->has('surface_area'))
                        <p class="help-block">
                            {{ $errors->first('surface_area') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('baking_time_pre', 'Pre Bake Time', ['class' => 'control-label']) !!}
                    {!! Form::text('baking_time_pre', old('baking_time_pre'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('baking_time_pre'))
                        <p class="help-block">
                            {{ $errors->first('baking_time_pre') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('baking_temp_pre', 'Pre Bake Temp', ['class' => 'control-label']) !!}
                    {!! Form::text('baking_temp_pre', old('baking_temp_pre'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('baking_temp_pre'))
                        <p class="help-block">
                            {{ $errors->first('baking_temp_pre') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('baking_time_post', 'Post Bake Time', ['class' => 'control-label']) !!}
                    {!! Form::text('baking_time_post', old('baking_time_post'), ['class' => 'form-control', 'placeholder' => 'Hours']) !!}
                    <p class="help-block">Hours</p>
                    @if($errors->has('baking_time_post'))
                        <p class="help-block">
                            {{ $errors->first('baking_time_post') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('baking_temp_post', 'Post Bake Temp', ['class' => 'control-label']) !!}
                    {!! Form::text('baking_temp_post', old('baking_temp_post'), ['class' => 'form-control', 'placeholder' => 'In Fahrenheit']) !!}
                    <p class="help-block">In Fahrenheit</p>
                    @if($errors->has('baking_temp_post'))
                        <p class="help-block">
                            {{ $errors->first('baking_temp_post') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bake_notes', 'Baking Notes', ['class' => 'control-label']) !!}
                    {!! Form::text('bake_notes', old('bake_notes'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bake_notes'))
                        <p class="help-block">
                            {{ $errors->first('bake_notes') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('blasting', 'Blasting', ['class' => 'control-label']) !!}
                    {!! Form::hidden('blasting', 0) !!}
                    {!! Form::checkbox('blasting', 1, old('blasting', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('blasting'))
                        <p class="help-block">
                            {{ $errors->first('blasting') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('blast_notes', 'Blast Note', ['class' => 'control-label']) !!}
                    {!! Form::text('blast_notes', old('blast_notes'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('blast_notes'))
                        <p class="help-block">
                            {{ $errors->first('blast_notes') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('masking', 'Masking', ['class' => 'control-label']) !!}
                    {!! Form::hidden('masking', 0) !!}
                    {!! Form::checkbox('masking', 1, old('masking', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('masking'))
                        <p class="help-block">
                            {{ $errors->first('masking') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mask_notes', 'Mask Notes', ['class' => 'control-label']) !!}
                    {!! Form::text('mask_notes', old('mask_notes'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mask_notes'))
                        <p class="help-block">
                            {{ $errors->first('mask_notes') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('testing', 'Testing', ['class' => 'control-label']) !!}
                    {!! Form::hidden('testing', 0) !!}
                    {!! Form::checkbox('testing', 1, old('testing', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('testing'))
                        <p class="help-block">
                            {{ $errors->first('testing') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('testing_note', 'Test Notes', ['class' => 'control-label']) !!}
                    {!! Form::text('testing_note', old('testing_note'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('testing_note'))
                        <p class="help-block">
                            {{ $errors->first('testing_note') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('print', 'Print', ['class' => 'control-label']) !!}
                    {!! Form::hidden('print', old('print')) !!}
                    {!! Form::file('print', ['class' => 'form-control']) !!}
                    {!! Form::hidden('print_max_size', 12) !!}
                    <p class="help-block"></p>
                    @if($errors->has('print'))
                        <p class="help-block">
                            {{ $errors->first('print') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('notes', 'Notes', ['class' => 'control-label']) !!}
                    {!! Form::textarea('notes', old('notes'), ['class' => 'form-control ', 'placeholder' => 'Customer Can See']) !!}
                    <p class="help-block">Customer Can See</p>
                    @if($errors->has('notes'))
                        <p class="help-block">
                            {{ $errors->first('notes') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comments', 'Comments', ['class' => 'control-label']) !!}
                    {!! Form::textarea('comments', old('comments'), ['class' => 'form-control ', 'placeholder' => 'Internal Use Only']) !!}
                    <p class="help-block">Internal Use Only</p>
                    @if($errors->has('comments'))
                        <p class="help-block">
                            {{ $errors->first('comments') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_id', 'User', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

