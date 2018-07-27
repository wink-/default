@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.discrepant-material.title')</h3>
    
    {!! Form::model($discrepant_material, ['method' => 'PUT', 'route' => ['admin.discrepant_materials.update', $discrepant_material->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('workorder', 'Workorder', ['class' => 'control-label']) !!}
                    {!! Form::text('workorder', old('workorder'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('workorder'))
                        <p class="help-block">
                            {{ $errors->first('workorder') }}
                        </p>
                    @endif
                </div>
            </div>            

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantity_rejected', trans('global.discrepant-material.fields.quantity-rejected').'', ['class' => 'control-label']) !!}
                    {!! Form::number('quantity_rejected', old('quantity_rejected'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quantity_rejected'))
                        <p class="help-block">
                            {{ $errors->first('quantity_rejected') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('reason_for_rejection', trans('global.discrepant-material.fields.reason-for-rejection').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('reason_for_rejection', old('reason_for_rejection'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('reason_for_rejection'))
                        <p class="help-block">
                            {{ $errors->first('reason_for_rejection') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rejection_date', trans('global.discrepant-material.fields.rejection-date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('rejection_date', old('rejection_date'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rejection_date'))
                        <p class="help-block">
                            {{ $errors->first('rejection_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rejection_type', trans('global.discrepant-material.fields.rejection-type').'', ['class' => 'control-label']) !!}
                    {!! Form::select('rejection_type', $enum_rejection_type, old('rejection_type'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rejection_type'))
                        <p class="help-block">
                            {{ $errors->first('rejection_type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('corrective_action_due_date', trans('global.discrepant-material.fields.corrective-action-due-date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('corrective_action_due_date', old('corrective_action_due_date'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('corrective_action_due_date'))
                        <p class="help-block">
                            {{ $errors->first('corrective_action_due_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('picture', trans('global.discrepant-material.fields.picture').'', ['class' => 'control-label']) !!}
                    {!! Form::file('picture[]', [
                        'multiple',
                        'class' => 'form-control file-upload',
                        'data-url' => route('admin.media.upload'),
                        'data-bucket' => 'picture',
                        'data-filekey' => 'picture',
                        ]) !!}
                    <p class="help-block"></p>
                    <div class="photo-block">
                        <div class="progress-bar form-group">&nbsp;</div>
                        <div class="files-list">
                            @foreach($discrepant_material->getMedia('picture') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                    <a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>
                                    <input type="hidden" name="picture_id[]" value="{{ $media->id }}">
                                </p>
                            @endforeach
                        </div>
                    </div>
                    @if($errors->has('picture'))
                        <p class="help-block">
                            {{ $errors->first('picture') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('form', trans('global.discrepant-material.fields.form').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('form', old('form')) !!}
                    @if ($discrepant_material->form)
                        <a href="{{ asset(env('UPLOAD_PATH').'/' . $discrepant_material->form) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('form', ['class' => 'form-control']) !!}
                    {!! Form::hidden('form_max_size', 6) !!}
                    <p class="help-block"></p>
                    @if($errors->has('form'))
                        <p class="help-block">
                            {{ $errors->first('form') }}
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
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: false,
            });
            
        });
    </script>
            
    <script src="{{ asset('adminlte/plugins/fileUpload/js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/fileUpload/js/jquery.fileupload.js') }}"></script>
    <script>
        $(function () {
            $('.file-upload').each(function () {
                var $this = $(this);
                var $parent = $(this).parent();

                $(this).fileupload({
                    dataType: 'json',
                    formData: {
                        model_name: 'DiscrepantMaterial',
                        bucket: $this.data('bucket'),
                        file_key: $this.data('filekey'),
                        _token: '{{ csrf_token() }}'
                    },
                    add: function (e, data) {
                        data.submit();
                    },
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            var $line = $($('<p/>', {class: "form-group"}).html(file.name + ' (' + file.size + ' bytes)').appendTo($parent.find('.files-list')));
                            $line.append('<a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>');
                            $line.append('<input type="hidden" name="' + $this.data('bucket') + '_id[]" value="' + file.id + '"/>');
                            if ($parent.find('.' + $this.data('bucket') + '-ids').val() != '') {
                                $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + ',');
                            }
                            $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + file.id);
                        });
                        $parent.find('.progress-bar').hide().css(
                            'width',
                            '0%'
                        );
                    }
                }).on('fileuploadprogressall', function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $parent.find('.progress-bar').show().css(
                        'width',
                        progress + '%'
                    );
                });
            });
            $(document).on('click', '.remove-file', function () {
                var $parent = $(this).parent();
                $parent.remove();
                return false;
            });
        });
    </script>
@stop