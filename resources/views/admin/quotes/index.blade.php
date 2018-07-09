@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.quotes.title')</h3>
    @can('quote_create')
    <p>
        <a href="{{ route('admin.quotes.create') }}" class="btn btn-success">Add New</a>        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.quotes.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.quotes.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('quote_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('quote_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan
                        <th>Quote #</th>
                        <th>Customer</th>
                        <th>Part Number</th>
                        <th>Process</th>
                        <th>Qty Min</th>
                        <th>Qty Max</th>
                        <th>Price</th>
                        <th>Min Lot Charge</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('quote_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.quotes.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.quotes.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('quote_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan
                {data: 'id', name: 'id'},
                {data: 'customer.name', name: 'customer.name'},
                {data: 'partnumber', name: 'partnumber'},
                {data: 'process.name', name: 'process.name'},
                {data: 'quantity_minimum', name: 'quantity_minimum'},
                {data: 'quantity_maximum', name: 'quantity_maximum'},
                {data: 'price', name: 'price'},
                {data: 'minimum_lot_charge', name: 'minimum_lot_charge'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            window.dtDefaultOptions.order = [[ 1, "desc" ]];
            processAjaxTables();
        });
    </script>
@endsection