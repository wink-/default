@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.customer.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.customers.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('code', trans('global.customer.fields.code').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('code', old('code'), ['class' => 'form-control', 'placeholder' => 'Unique Customer Code', 'required' => '']) !!}
                    <p class="help-block">Unique Customer Code</p>
                    @if($errors->has('code'))
                        <p class="help-block">
                            {{ $errors->first('code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('global.customer.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Customer\'s Full Name', 'required' => '']) !!}
                    <p class="help-block">Customer's Full Name</p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('physical_address', trans('global.customer.fields.physical-address').'', ['class' => 'control-label']) !!}
                    {!! Form::text('physical_address', old('physical_address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('physical_address'))
                        <p class="help-block">
                            {{ $errors->first('physical_address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('address_extension', trans('global.customer.fields.address-extension').'', ['class' => 'control-label']) !!}
                    {!! Form::text('address_extension', old('address_extension'), ['class' => 'form-control', 'placeholder' => 'PO Box, Suite #, etc']) !!}
                    <p class="help-block">PO Box, Suite #, etc</p>
                    @if($errors->has('address_extension'))
                        <p class="help-block">
                            {{ $errors->first('address_extension') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('city', trans('global.customer.fields.city').'', ['class' => 'control-label']) !!}
                    {!! Form::text('city', old('city'), ['class' => 'form-control', 'placeholder' => 'Primary Address City']) !!}
                    <p class="help-block">Primary Address City</p>
                    @if($errors->has('city'))
                        <p class="help-block">
                            {{ $errors->first('city') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('state', trans('global.customer.fields.state').'', ['class' => 'control-label']) !!}
                    {!! Form::text('state', old('state'), ['class' => 'form-control', 'placeholder' => 'Primary Address State']) !!}
                    <p class="help-block">Primary Address State</p>
                    @if($errors->has('state'))
                        <p class="help-block">
                            {{ $errors->first('state') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('zip', trans('global.customer.fields.zip').'', ['class' => 'control-label']) !!}
                    {!! Form::text('zip', old('zip'), ['class' => 'form-control', 'placeholder' => 'Primary Address Zip Code']) !!}
                    <p class="help-block">Primary Address Zip Code</p>
                    @if($errors->has('zip'))
                        <p class="help-block">
                            {{ $errors->first('zip') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('company_phone', trans('global.customer.fields.company-phone').'', ['class' => 'control-label']) !!}
                    {!! Form::text('company_phone', old('company_phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('company_phone'))
                        <p class="help-block">
                            {{ $errors->first('company_phone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fax', trans('global.customer.fields.fax').'', ['class' => 'control-label']) !!}
                    {!! Form::text('fax', old('fax'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fax'))
                        <p class="help-block">
                            {{ $errors->first('fax') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('global.customer.fields.email').'', ['class' => 'control-label']) !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('note', trans('global.customer.fields.note').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('billing_address', trans('global.customer.fields.billing-address').'', ['class' => 'control-label']) !!}
                    {!! Form::text('billing_address', old('billing_address'), ['class' => 'form-control', 'placeholder' => 'Use if billing goes to a separate address']) !!}
                    <p class="help-block">Use if billing goes to a separate address</p>
                    @if($errors->has('billing_address'))
                        <p class="help-block">
                            {{ $errors->first('billing_address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('billing_city', trans('global.customer.fields.billing-city').'', ['class' => 'control-label']) !!}
                    {!! Form::text('billing_city', old('billing_city'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('billing_city'))
                        <p class="help-block">
                            {{ $errors->first('billing_city') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('billing_state', trans('global.customer.fields.billing-state').'', ['class' => 'control-label']) !!}
                    {!! Form::text('billing_state', old('billing_state'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('billing_state'))
                        <p class="help-block">
                            {{ $errors->first('billing_state') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('billing_zip', trans('global.customer.fields.billing-zip').'', ['class' => 'control-label']) !!}
                    {!! Form::text('billing_zip', old('billing_zip'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('billing_zip'))
                        <p class="help-block">
                            {{ $errors->first('billing_zip') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('billing_phone', trans('global.customer.fields.billing-phone').'', ['class' => 'control-label']) !!}
                    {!! Form::text('billing_phone', old('billing_phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('billing_phone'))
                        <p class="help-block">
                            {{ $errors->first('billing_phone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('billing_fax', trans('global.customer.fields.billing-fax').'', ['class' => 'control-label']) !!}
                    {!! Form::text('billing_fax', old('billing_fax'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('billing_fax'))
                        <p class="help-block">
                            {{ $errors->first('billing_fax') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('billing_email', trans('global.customer.fields.billing-email').'', ['class' => 'control-label']) !!}
                    {!! Form::text('billing_email', old('billing_email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('billing_email'))
                        <p class="help-block">
                            {{ $errors->first('billing_email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ship_to_address', trans('global.customer.fields.ship-to-address').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ship_to_address', old('ship_to_address'), ['class' => 'form-control', 'placeholder' => 'If shipping address is different than the primary address']) !!}
                    <p class="help-block">If shipping address is different than the primary address</p>
                    @if($errors->has('ship_to_address'))
                        <p class="help-block">
                            {{ $errors->first('ship_to_address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ship_to_city', trans('global.customer.fields.ship-to-city').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ship_to_city', old('ship_to_city'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ship_to_city'))
                        <p class="help-block">
                            {{ $errors->first('ship_to_city') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ship_to_state', trans('global.customer.fields.ship-to-state').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ship_to_state', old('ship_to_state'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ship_to_state'))
                        <p class="help-block">
                            {{ $errors->first('ship_to_state') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ship_to_zip', trans('global.customer.fields.ship-to-zip').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ship_to_zip', old('ship_to_zip'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ship_to_zip'))
                        <p class="help-block">
                            {{ $errors->first('ship_to_zip') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ship_to_phone', trans('global.customer.fields.ship-to-phone').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ship_to_phone', old('ship_to_phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ship_to_phone'))
                        <p class="help-block">
                            {{ $errors->first('ship_to_phone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ship_to_fax', trans('global.customer.fields.ship-to-fax').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ship_to_fax', old('ship_to_fax'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ship_to_fax'))
                        <p class="help-block">
                            {{ $errors->first('ship_to_fax') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ship_to_email', trans('global.customer.fields.ship-to-email').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ship_to_email', old('ship_to_email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ship_to_email'))
                        <p class="help-block">
                            {{ $errors->first('ship_to_email') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

