@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.corrective-actions.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.corrective-actions.fields.discrepant-material')</th>
                            <td field-key='discrepant_material'>{{ $corrective_action->discrepant_material->part_number or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.corrective-actions.fields.description-of-non-conformance')</th>
                            <td field-key='description_of_non_conformance'>{!! $corrective_action->description_of_non_conformance !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.corrective-actions.fields.containment')</th>
                            <td field-key='containment'>{!! $corrective_action->containment !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.corrective-actions.fields.interim-action')</th>
                            <td field-key='interim_action'>{!! $corrective_action->interim_action !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.corrective-actions.fields.preventative-action')</th>
                            <td field-key='preventative_action'>{!! $corrective_action->preventative_action !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.corrective-actions.fields.root-cause')</th>
                            <td field-key='root_cause'>{!! $corrective_action->root_cause !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.corrective-actions.fields.verification')</th>
                            <td field-key='verification'>{!! $corrective_action->verification !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.corrective-actions.fields.complete')</th>
                            <td field-key='complete'>{{ Form::checkbox("complete", 1, $corrective_action->complete == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.corrective-actions.fields.completed-at')</th>
                            <td field-key='completed_at'>{{ $corrective_action->completed_at }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.corrective-actions.fields.supporting-document')</th>
                            <td field-key='supporting_document'>@if($corrective_action->supporting_document)<a href="{{ asset(env('UPLOAD_PATH').'/' . $corrective_action->supporting_document) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.corrective_actions.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
