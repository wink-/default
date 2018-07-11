@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('global.app_dashboard')</div>

                <div class="panel-body">
                    @can('view_money')
                    
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
