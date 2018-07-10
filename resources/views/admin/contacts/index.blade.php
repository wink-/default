@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">
        <ul class="list-inline">            
        <li><h3 class="page-title">Contacts</h3></li>
        @can('contact_create')
            <li><a href="{{ route('admin.contacts.create') }}" class="btn btn-success">Add New</a></li>
        @endcan
        </ul>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped display compact ajaxTable @can('contact_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('contact_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.contacts.fields.customer')</th>
                        <th>@lang('global.customer.fields.name')</th>
                        <th>@lang('global.contacts.fields.first-name')</th>
                        <th>@lang('global.contacts.fields.last-name')</th>
                        <th>@lang('global.contacts.fields.phone')</th>
                        <th>@lang('global.contacts.fields.extension')</th>
                        <th>@lang('global.contacts.fields.email')</th>
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
            <li><a href="{{ route('admin.contacts.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.contacts.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>

@stop

@section('javascript') 
    <script>
        @can('contact_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.contacts.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.contacts.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('contact_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'customer.code', name: 'customer.code'},
                {data: 'customer.name', name: 'customer.name'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'phone', name: 'phone'},
                {data: 'extension', name: 'extension'},
                {data: 'email', name: 'email'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection