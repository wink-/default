@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.discrepant-material.title')</h3>
    @can('quality_create')
    <p>
        <a href="{{ route('admin.discrepant_materials.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.discrepant_materials.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.discrepant_materials.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('mass_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('mass_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.discrepant-material.fields.workorder')</th>
                        <th>@lang('global.discrepant-material.fields.part-number')</th>
                        <th>@lang('global.discrepant-material.fields.customer-code')</th>
                        <th>@lang('global.discrepant-material.fields.process-code')</th>
                        <th>@lang('global.discrepant-material.fields.quantity-rejected')</th>
                        <th>@lang('global.discrepant-material.fields.rejection-date')</th>
                        <th>@lang('global.discrepant-material.fields.rejection-type')</th>
                        <th>@lang('global.discrepant-material.fields.corrective-action-due-date')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>Actions</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('mass_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.discrepant_materials.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.discrepant_materials.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('mass_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan
                {data: 'workorder', name: 'workorder'},
                {data: 'part_number', name: 'part_number'},
                {data: 'customer_code', name: 'customer_code'},
                {data: 'process_code', name: 'process_code'},
                {data: 'quantity_rejected', name: 'quantity_rejected'},
                {data: 'rejection_date', name: 'rejection_date'},
                {data: 'rejection_type', name: 'rejection_type'},
                {data: 'corrective_action_due_date', name: 'corrective_action_due_date'},                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection