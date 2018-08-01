@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.corrective-actions.title')</h3>
    
    {!! Form::model($corrective_action, ['method' => 'PUT', 'route' => ['admin.corrective_actions.update', $corrective_action->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('discrepant_material_id', trans('global.corrective-actions.fields.discrepant-material').'', ['class' => 'control-label']) !!}
                    {!! Form::select('discrepant_material_id', $discrepant_materials, old('discrepant_material_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('discrepant_material_id'))
                        <p class="help-block">
                            {{ $errors->first('discrepant_material_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description_of_non_conformance', trans('global.corrective-actions.fields.description-of-non-conformance').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description_of_non_conformance', old('description_of_non_conformance'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description_of_non_conformance'))
                        <p class="help-block">
                            {{ $errors->first('description_of_non_conformance') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('containment', trans('global.corrective-actions.fields.containment').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('containment', old('containment'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('containment'))
                        <p class="help-block">
                            {{ $errors->first('containment') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('interim_action', trans('global.corrective-actions.fields.interim-action').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('interim_action', old('interim_action'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('interim_action'))
                        <p class="help-block">
                            {{ $errors->first('interim_action') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('preventative_action', trans('global.corrective-actions.fields.preventative-action').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('preventative_action', old('preventative_action'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('preventative_action'))
                        <p class="help-block">
                            {{ $errors->first('preventative_action') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('root_cause', trans('global.corrective-actions.fields.root-cause').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('root_cause', old('root_cause'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('root_cause'))
                        <p class="help-block">
                            {{ $errors->first('root_cause') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('verification', trans('global.corrective-actions.fields.verification').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('verification', old('verification'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('verification'))
                        <p class="help-block">
                            {{ $errors->first('verification') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('complete', trans('global.corrective-actions.fields.complete').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('complete', 0) !!}
                    {!! Form::checkbox('complete', 1, old('complete', old('complete')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('complete'))
                        <p class="help-block">
                            {{ $errors->first('complete') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('completed_at', trans('global.corrective-actions.fields.completed-at').'', ['class' => 'control-label']) !!}
                    {!! Form::text('completed_at', old('completed_at'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('completed_at'))
                        <p class="help-block">
                            {{ $errors->first('completed_at') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('supporting_document', trans('global.corrective-actions.fields.supporting-document').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('supporting_document', old('supporting_document')) !!}
                    @if ($corrective_action->supporting_document)
                        <a href="{{ asset(env('UPLOAD_PATH').'/' . $corrective_action->supporting_document) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('supporting_document', ['class' => 'form-control']) !!}
                    {!! Form::hidden('supporting_document_max_size', 6) !!}
                    <p class="help-block"></p>
                    @if($errors->has('supporting_document'))
                        <p class="help-block">
                            {{ $errors->first('supporting_document') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop