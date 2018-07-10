@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
        <ul class="list-inline">
            <li><h3 class="page-title">@lang('global.processes.title')</h3></li>
        @can('process_create')            
            <li><a href="{{ route('admin.processes.create') }}" class="btn btn-success">Add New</a></li>            
        @endcan
        </ul>            

        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped display compact ajaxTable @can('process_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('process_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.processes.fields.code')</th>
                        <th>@lang('global.processes.fields.name')</th>
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
            <li><a href="{{ route('admin.processes.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.processes.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>    
@stop

@section('javascript') 
    <script>
        @can('process_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.processes.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.processes.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('process_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'code', name: 'code'},
                {data: 'name', name: 'name'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection