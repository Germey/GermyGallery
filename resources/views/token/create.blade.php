@extends('manage.wrap')

@section('main')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>创建一个密钥
                        </h5>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(['url' => url('/manage/token'), 'class' => 'form-horizontal']) !!}

                        <div class="form-group">
                            {!! Form::label('value', '密钥', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => '填写密钥']) !!}
                                <span class="help-block m-b-none">添加一份密钥吧</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!! Form::label('kind', '类别', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('kind', $auth_kind, null, ['class' => 'form-control', 'placeholder' => '填写描述']) !!}
                                <span class="help-block m-b-none">为密钥选择类别</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                {!! Form::submit('添加', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection