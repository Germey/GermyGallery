@extends('manage.wrap')

@section('main')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>创建属于你的记忆
                            <small>记录属于你我的记忆</small>
                        </h5>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(['url' => url('/manage/memory'), 'class' => 'form-horizontal']) !!}

                        <div class="form-group">
                            {!! Form::label('title', '记忆主题', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '填写主题']) !!}
                                <span class="help-block m-b-none">这是哪份美好的记忆?</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!! Form::label('description', '记忆描述', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '填写描述']) !!}
                                <span class="help-block m-b-none">详细描述下这份记忆吧~</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!! Form::label('date_start', '发生日期', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('date_start', null, ['class' => 'form-control datepicker', 'placeholder' => '选择日期', 'data-date-format' => 'yyyy-mm-dd']) !!}
                                <span class="help-block m-b-none">那天是什么是时候?</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!! Form::label('date_end', '圆满日期', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('date_end', null, ['class' => 'form-control datepicker', 'placeholder' => '选择日期', 'data-date-format' => 'yyyy-mm-dd']) !!}
                                <span class="help-block m-b-none">如果是多天,可以选择填写结束的日期.当天可以不填.</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!! Form::label('location', '地点标注', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => '填写地点']) !!}
                                <span class="help-block m-b-none">这份记忆发生于哪里呢?</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!! Form::label('happiness', '幸福程度', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::select('happiness', $happiness, null, ['class' => 'form-control', 'placeholder' => '幸福程度']) !!}
                                <span class="help-block m-b-none">超开心?那是有多开心?</span>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('tags[]', '标签', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::select('tags[]', $memory_tags, null, ['class' => 'form-control', 'id' => 'tags', 'multiple' => 'multiple']) !!}
                                <span class="help-block m-b-none">为这份记忆添加一个标签吧~</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                {!! Form::file('upload', ['id'=>'upload-images', 'class' => 'uploadify', 'display' => '#display-images']) !!}
                                <span class="help-block m-b-none">你一定用照片来记录了那永恒的瞬间</span>
                            </div>
                        </div>
                        <div class="form-group display-images">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="row" id="display-images">

                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!! Form::label('anim', '照片动画', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::select('anim', $anim, 'random', ['class' => 'form-control', 'placeholder' => '照片展示动画']) !!}
                                <span class="help-block m-b-none">选择一个你喜欢的播放动画吧~</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
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
    @include('support.uploadifymul')
    @include('support.select2')
    <script>
        $(function() {
            $("#tags").select2({
                tags: true
            })
        });
    </script>
@endsection