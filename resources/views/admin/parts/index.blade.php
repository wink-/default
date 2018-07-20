@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.parts.title')</h3>
    @can('part_create')
    <p>
        <a href="{{ route('admin.parts.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped display compact ajaxTable @can('part_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('part_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.parts.fields.number')</th>
                        <th>@lang('global.parts.fields.description')</th>
                        <th>@lang('global.parts.fields.customer')</th>
                        <th>@lang('global.customer.fields.name')</th>
                        <th>@lang('global.parts.fields.process')</th>
                        <th>@lang('global.parts.fields.price')</th>
                        <th>@lang('global.parts.fields.specification')</th>
                        <th>@lang('global.parts.fields.bake')</th>
                        <th>@lang('global.parts.fields.material')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('part_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.parts.mass_destroy') }}';
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.parts.index') !!}';
            window.dtDefaultOptions.columns = [@can('part_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: true},
                @endcan
                {data: 'number', name: 'number'},
                {data: 'description', name: 'description'},
                {data: 'customer.code', name: 'customer.code'},
                {data: 'customer.name', name: 'customer.name'},
                {data: 'process.code', name: 'process.code'},
                {data: 'price', name: 'price'},
                {data: 'specification', name: 'specification'},
                {data: 'bake', name: 'bake'},
                {data: 'material', name: 'material'},                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            window.dtDefaultOptions.order = [[ 0, "desc" ]];
            processAjaxTables();
        });
    </script>
@endsection