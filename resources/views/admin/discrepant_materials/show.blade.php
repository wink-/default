@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.discrepant-material.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.discrepant-material.fields.workorder')</th>
                            <td field-key='workorder'>{{ $discrepant_material->workorder or '' }}</td>
                        </tr>
                        
                        <tr>
                            <th>@lang('global.discrepant-material.fields.part')</th>
                            <td field-key='part'>{{ $discrepant_material->part->number or '' }}</td>
                        </tr>

                        <tr>
                            <th>@lang('global.discrepant-material.fields.part-number')</th>
                            <td field-key='part_number'>{{ $discrepant_material->part_number }}</td>
                        </tr>

                        <tr>
                            <th>@lang('global.discrepant-material.fields.customer')</th>
                            <td field-key='customer'>{{ $discrepant_material->customer->name or '' }}</td>
                        </tr>
                       
                        <tr>
                            <th>@lang('global.discrepant-material.fields.customer-code')</th>
                            <td field-key='customer_code'>{{ $discrepant_material->customer_code }}</td>
                        </tr>

                        <tr>
                            <th>@lang('global.discrepant-material.fields.process')</th>
                            <td field-key='process'>{{ $discrepant_material->process->code or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.discrepant-material.fields.process-code')</th>
                            <td field-key='process_code'>{{ $discrepant_material->process_code }}</td>
                        </tr>

                        <tr>
                            <th>@lang('global.discrepant-material.fields.quantity-rejected')</th>
                            <td field-key='quantity_rejected'>{{ $discrepant_material->quantity_rejected }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.discrepant-material.fields.reason-for-rejection')</th>
                            <td field-key='reason_for_rejection'>{!! $discrepant_material->reason_for_rejection !!}</td>
                        </tr>

                        <tr>
                            <th>@lang('global.discrepant-material.fields.rejection-date')</th>
                            <td field-key='rejection_date'>{{ $discrepant_material->rejection_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.discrepant-material.fields.rejection-type')</th>
                            <td field-key='rejection_type'>{{ $discrepant_material->rejection_type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.discrepant-material.fields.corrective-action-due-date')</th>
                            <td field-key='corrective_action_due_date'>{{ $discrepant_material->corrective_action_due_date }}</td>
                        </tr>

                        <tr>
                            <th>@lang('global.discrepant-material.fields.picture')</th>
                            <td field-key='picture's> @foreach($discrepant_material->getMedia('picture') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                        </tr>
                        <tr>
                            <th>@lang('global.discrepant-material.fields.form')</th>
                            <td field-key='form'>@if($discrepant_material->form)<a href="{{ asset(env('UPLOAD_PATH').'/' . $discrepant_material->form) }}" target="_blank">Download file</a>@endif</td>
                        </tr>                        {{--   --}}
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.discrepant_materials.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
