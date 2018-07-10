@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    

    <div class="panel panel-default">
        <div class="panel-heading">
            <ul class="list-inline">
                <li><h3>Customers</h3></li>
                @can('customer_create')
                <li><a href="{{ route('admin.customers.create') }}" class="btn btn-success">Add New</a></li>
                @endcan
            </ul>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped display compact ajaxTable @can('customer_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('customer_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.customer.fields.code')</th>
                        <th>@lang('global.customer.fields.name')</th>
                        <th>@lang('global.customer.fields.physical-address')</th>
                        <th>@lang('global.customer.fields.city')</th>
                        <th>@lang('global.customer.fields.state')</th>
                        <th>@lang('global.customer.fields.company-phone')</th>
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
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.customers.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.customers.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>    

@stop

@section('javascript') 
    <script>
        @can('customer_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.customers.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.customers.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('customer_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'code', name: 'code'},
                {data: 'name', name: 'name'},
                {data: 'physical_address', name: 'physical_address'},
                {data: 'city', name: 'city'},
                {data: 'state', name: 'state'},
                {data: 'company_phone', name: 'company_phone'},                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection