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
                                        @elseif($config['type'] == 'select')
                                            <div class="col-sm-3">
                                                {!! Form::select($config['key'], $select_items[$config['key']], $config['value'], ['class' => 'form-control']) !!}
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