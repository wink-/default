@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.workorders.title')</h3>
    @can('workorder_create')
    <p>
        <a href="{{ route('admin.workorders.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped display compact ajaxTable @can('workorder_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('workorder_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.workorders.fields.number')</th>
                        <th>@lang('global.workorders.fields.customer')</th>
                        <th>@lang('global.customer.fields.name')</th>
                        {{--<th>@lang('global.workorders.fields.part')</th>--}}
                        <th>@lang('global.workorders.fields.part-number')</th>
                        <th>@lang('global.workorders.fields.process')</th>
                        <th>@lang('global.workorders.fields.price')</th>
                        <th>@lang('global.workorders.fields.price-code')</th>
                        <th>@lang('global.workorders.fields.date-received')</th>
                        <th>@lang('global.workorders.fields.date-required')</th>
                        <th>@lang('global.workorders.fields.customer-purchase-order')</th>
                        <th>@lang('global.workorders.fields.customer-packing-list')</th>
                        <th>@lang('global.workorders.fields.quantity')</th>
                        {{--<th>@lang('global.workorders.fields.unit-code')</th>--}}
                        <th>@lang('global.workorders.fields.quantity-shipped')</th>
                        <th>@lang('global.workorders.fields.our-last-packing-list')</th>
                        <th>@lang('global.workorders.fields.date-shipped')</th>
                        <th>@lang('global.workorders.fields.invoice-number')</th>
                        <th>@lang('global.workorders.fields.rework')</th>
                        <th>@lang('global.workorders.fields.started')</th>
                        <th>@lang('global.workorders.fields.completed')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('workorder_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.workorders.mass_destroy') }}';
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.workorders.index') !!}';
            window.dtDefaultOptions.columns = [@can('workorder_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan{data: 'number', name: 'number'},
                {data: 'customer.code', name: 'customer.code'},
                {data: 'customer.name', name: 'customer.name'},
                {{--{data: 'part.number', name: 'part.number'}, --}}
                {data: 'part_number', name: 'part_number'},
                {data: 'process.code', name: 'process.code'},
                {data: 'price', name: 'price'},
                {data: 'price_code', name: 'price_code'},
                {data: 'date_received', name: 'date_received'},
                {data: 'date_required', name: 'date_required'},
                {data: 'customer_purchase_order', name: 'customer_purchase_order'},
                {data: 'customer_packing_list', name: 'customer_packing_list'},
                {data: 'quantity', name: 'quantity'},
                {{--{data: 'unit_code', name: 'unit_code'},--}}
                {data: 'quantity_shipped', name: 'quantity_shipped'},
                {data: 'our_last_packing_list', name: 'our_last_packing_list'},
                {data: 'date_shipped', name: 'date_shipped'},
                {data: 'invoice_number', name: 'invoice_number'},
                {data: 'rework', name: 'rework'},
                {data: 'started', name: 'started'},
                {data: 'completed', name: 'completed'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection