@extends('manage.wrap')

@section('main')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>所有表单元素
                            <small>包括自定义样式的复选和单选按钮</small>
                        </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(['url' => url('/manage/memory'), 'class' => 'form-horizontal']) !!}

                        <div class="form-group">
                            {!! Form::label('title', '记忆主题', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                <span class="help-block m-b-none">帮助文本，可能会超过一行，以块级元素显示</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!! Form::label('description', '记忆描述', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                <span class="help-block m-b-none">帮助文本，可能会超过一行，以块级元素显示</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!! Form::label('date_start', '发生日期', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('date_start', null, ['class' => 'form-control datepicker', 'placeholder' => '选择日期', 'data-date-format' => 'yyyy-mm-dd']) !!}
                                <span class="help-block m-b-none">帮助文本，可能会超过一行，以块级元素显示</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!! Form::label('date_end', '圆满日期', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('date_end', null, ['class' => 'form-control datepicker', 'placeholder' => '选择日期', 'data-date-format' => 'yyyy-mm-dd']) !!}
                                <span class="help-block m-b-none">帮助文本，可能会超过一行，以块级元素显示</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!! Form::label('location', '地点标注', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('location', null, ['class' => 'form-control']) !!}
                                <span class="help-block m-b-none">帮助文本，可能会超过一行，以块级元素显示</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!! Form::label('happiness', '幸福程度', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('happiness', null, ['class' => 'form-control']) !!}
                                <span class="help-block m-b-none">帮助文本，可能会超过一行，以块级元素显示</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                {!! Form::file('upload', ['id'=>'upload-images', 'class' => 'uploadify']) !!}
                                {!! Form::hidden('image', null) !!}
                                <img src="" class="pre-view" />
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                {!! Form::submit('保存记忆', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('support.datepicker')
    @include('support.uploadify')
@endsection