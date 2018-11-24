@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.contacts.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.contacts.fields.customer')</th>
                            <td field-key='customer'>{{ $contact->customer->code ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.customer.fields.name')</th>
                            <td field-key='name'>{{ isset($contact->customer) ? $contact->customer->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.contacts.fields.first-name')</th>
                            <td field-key='first_name'>{{ $contact->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.contacts.fields.last-name')</th>
                            <td field-key='last_name'>{{ $contact->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.contacts.fields.phone')</th>
                            <td field-key='phone'>{{ $contact->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.contacts.fields.extension')</th>
                            <td field-key='extension'>{{ $contact->extension }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.contacts.fields.email')</th>
                            <td field-key='email'>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.contacts.fields.archive')</th>
                            <td field-key='archive'>{{ Form::checkbox("archive", 1, $contact->archive == 1 ? true : false, ["disabled"]) }}</td>
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
                    <td field-key='customer'>{{ $quote->customer->name ?? '' }}</td>
                                <td field-key='partnumber'>{{ $quote->partnumber }}</td>
                                <td field-key='process'>{{ $quote->process->name ?? '' }}</td>
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
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.contacts.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
