@extends('manage.wrap')

@section('main')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改配置
                            <small>个性化定制你的站点</small>
                        </h5>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(['url' => url('/manage/config/update'), 'class' => 'form-horizontal']) !!}
                        @foreach($config_items as $config_item)
                            @foreach($configs as $config)
                                @if($config['key'] == $config_item)
                                    <div class="form-group">
                                        {!! Form::label($config['key'], $config['title'], ['class' => 'col-sm-2 control-label']) !!}
                                        @if($config['type'] == 'text')
                                            <div class="col-sm-8">
                                                {!! Form::text($config['key'], $config['value'], ['class' => 'form-control']) !!}
                                                <span class="help-block m-b-none">{{ $config['description'] }}</span>
                                            </div>
                                        @elseif($config['type'] == 'color')
                                            <div class="col-sm-3">
                                                <div class="input-group colorpicker" data-color-format="rgba"
                                                     data-color="{{ $config['value'] }}">
                                                    {!! Form::text($config['key'], $config['value'], ['class' => 'form-control']) !!}
                                                    <span class="input-group-addon"><i></i></span>
                                                </div>
                                                <span class="help-block m-b-none">{{ $config['description'] }}</span>
                                            </div>
                                        @elseif($config['type'] == 'pic')
                                            <div class="col-sm-8">
                                                {!! Form::file('upload', ['id' => $config['key'], 'class' => 'uploadify']) !!}
                                                {!! Form::hidden($config['key'], $config['value']) !!}
                                                <img src="{{ $config['value'] }}" class="pre-view"/>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                @endif
                            @endforeach
                        @endforeach
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('support.colorpicker')
    @include('support.uploadify')
@endsection
{{--@foreach($config_items as $config_item)
    @foreach($configs as $config)
        @if($config['key'] == $config_item)
            <div class="control-group">
                {!! Form::label('name', $config['title'], ['class' => 'control-label']) !!}
                <div class="controls">
                    @if($config['input'] == 'textarea')
                        {!! Form::textarea($config['key'], $config['value'], ['class' => $config['class']]) !!}
                    @elseif($config['input'] == 'radio')
                        <div data-toggle="buttons-radio" class="{{ $config['class'] }}">
                            {!! Form::button('是', ['class' => 'btn', 'value' => 1]) !!}
                            {!! Form::button('否', ['class' => 'btn', 'value' => 0]) !!}
                            {!! Form::hidden($config['key'], $config['value'], ['class' => 'value']) !!}
                        </div>
                    @elseif($config['input'] == 'time')
                        <div id="datetimepicker3" class="{{ $config['class'] }}">
                            {!! Form::text($config['key'], $config['value'], ['data-format' => 'hh:mm:ss']) !!}}
                            <span class="add-on">
                                <i data-time-icon="icon-time"
                                   data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                    @else
                        {!! Form::text($config['key'], $config['value'], ['class' => $config['class']]) !!}
                    @endif
                    {!! Form::label('describe', $config['description'], ['class' => 'describe-label']) !!}
                </div>
            </div>
        @endif
    @endforeach
@endforeach
--}}