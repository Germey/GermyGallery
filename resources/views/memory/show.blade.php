@extends('manage.wrap')
@section('main')
    <div class="wrapper wrapper-content" id="memory-show">
        <div class="row animated fadeInRight">
            <div class="col-sm-9">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>那份记忆</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <dl class="dl-horizontal">
                                    <dt>标签：</dt>
                                    <dd>
                                        @if($tags = $memory->tags)
                                            @foreach(explode(',', $tags) as $tag)
                                                <span class="label label-primary">{{ $tag }}</span>
                                            @endforeach
                                        @endif
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <dl class="dl-horizontal">
                                    <dt>记忆时间：</dt>
                                    <dd>{{ $memory->date_start }}</dd>
                                    @if($memory->date_end && $memory->date_start != $memory->date_end)
                                        <dt>圆满时间：</dt>
                                        <dd>{{ $memory->date_end }}</dd>
                                    @endif
                                </dl>
                            </div>
                            <div class="col-sm-7" id="cluster_info">
                                <dl class="dl-horizontal">
                                    <dt>记忆更新于：</dt>
                                    <dd>{{ $memory->updated_at }}</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <dl class="dl-horizontal">
                                    <dt>幸福指数</dt>
                                    <dd>
                                        <div class="progress progress-striped active m-b-sm">
                                            <div style="{{ 'width:'.$memory->happiness.'%;' }}"
                                                 class="progress-bar progress-bar-danger"></div>
                                        </div>
                                        <small>当前幸福指数为
                                            <strong>{{ $memory->happiness }}</strong>
                                            点
                                        </small>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            {!! Form::open(['url' => url('/manage/memory/'.$memory->id), 'method' => 'PUT']) !!}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        {!! Form::file('upload', ['id'=>'upload-images', 'class' => 'uploadify', 'display' => '#display-images']) !!}
                                    </div>
                                </div>
                                <div class="form-group display-images">
                                    <div class="col-md-10 col-md-offset-2">
                                        <div class="row" id="display-images">
                                            @if($images = $memory->getImages)
                                                @foreach($images as $image)
                                                    <div class="col-md-2 display-item">
                                                        <img src="{{ $image->path }}">
                                                        <input type="hidden" name="images[path][]"
                                                               value="{{ $image->path }}">
                                                        <input name="images[title][]" type="text" placeholder="添加标题"
                                                               class="form-control m-t-sm" value="{{ $image->title }}">
                                                        <input name="images[description][]" type="text"
                                                               placeholder="添加描述"
                                                               class="form-control m-t-sm"
                                                               value="{{ $image->description }}">
                                                        <button class="btn btn-danger btn-xs del-upload"><i
                                                                    class="fa fa-remove"></i>删除
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 text-center">
                                        {!! Form::submit('保存记忆', ['class' => 'btn btn-primary']) !!}
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>记忆详情</h5>
                        <a class="btn btn-primary btn-xs pull-right edit-info">编辑记忆</a>

                    </div>
                    <div class="ibox-content">

                        <p>
                            <i class="fa fa-fire"></i><strong>标题</strong>
                        </p>

                        <p>
                            <a data-url="{{ url('/manage/memory/update-info') }}"
                               data-type="text"
                               data-pk="{{ $memory->id }}" data-placement="right"
                               data-placeholder="记忆标题"
                               data-title="输入记忆标题"
                               data-name="title"
                               class="editable">{{ $memory->title}}</a>
                        </p>

                        <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                        <p>

                            <i class="fa fa-magic"></i><strong>描述</strong>
                        </p>


                        <p>
                            <a data-type="textarea" data-url="{{ url('/manage/memory/update-info') }}"
                               data-pk="{{ $memory->id }}" data-placeholder="记忆描述" data-title="详细描述"
                               data-name="description"
                               class="editable">{{ $memory->description }}</a>
                        </p>

                        <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                        @if($memory->location)
                            <p>
                                <i class="fa fa-map-marker"></i><strong>地点</strong>
                            </p>
                            <p>
                                <a data-url="{{ url('/manage/memory/update-info') }}"
                                   data-type="text"
                                   data-pk="{{ $memory->id }}" data-placement="right"
                                   data-placeholder="记忆地点"
                                   data-title="输入记忆地点"
                                   data-name="location"
                                   class="editable">{{ $memory->location}}</a>
                            </p>
                            <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                        @endif
                        <p>
                            <i class="fa fa-clock-o"></i><strong>开始时间</strong>
                        </p>

                        <p>
                            <a data-name="date_start" data-type="combodate" data-value="{{ $memory->date_start }}"
                               data-format="YYYY-MM-DD" data-viewformat="YYYY-MM-DD"
                               data-template="YYYY 年 MM 月 DD" data-pk="{{ $memory->id }}"
                               data-title="开始时间" data-url="{{ url('/manage/memory/update-info') }}"
                               class="editable">{{ $memory->date_start }}</a>
                        </p>

                        <p>
                            <i class="fa fa-clock-o"></i><strong>圆满时间</strong>
                        </p>

                        <p>
                            <a data-name="date_end" data-type="combodate" data-value="{{ $memory->date_end }}"
                               data-format="YYYY-MM-DD" data-viewformat="YYYY-MM-DD"
                               data-template="YYYY 年 MM 月 DD" data-pk="{{ $memory->id }}"
                               data-title="圆满时间" data-url="{{ url('/manage/memory/update-info') }}"
                               class="editable">{{ $memory->date_end }}</a>
                        </p>

                        <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                        <p>
                            <i class="fa fa-tag"></i><strong>标签</strong>
                        </p>

                        <p>
                            <a id="editable-tags" data-type="select2" data-pk="{{ $memory->id }}"
                               data-url="{{ url('/manage/memory/update-info') }}" data-name="tags"
                               data-title="选择或输入分类" class="editable">{{ $memory->tags }}</a>
                        </p>

                        <div class="hr-line-dashed m-t-sm m-b-sm"></div>

                        <p>
                            <i class="fa fa-heart"></i><strong>幸福指数</strong>
                        </p>

                        <p>
                            <a data-name="happiness" data-type="select" data-value="{{ $memory->happiness }}"
                               data-pk="{{ $memory->id }}" data-title="幸福指数"
                               data-url="{{ url('/manage/memory/update-info') }}"
                               class="editable" id="editable-happiness">{{ $memory->happiness }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('support.uploadifymul')
    @include('support.editable')
    <script>
        $(function() {
            $.fn.editable.defaults.mode = 'inline';
            $('#editable-tags').editable({
                select2: {
                    tags: eval({!! $memory_tags !!}),
                    tokenSeparators: [",", " "]
                }
            });
            $('#editable-happiness').editable({
                source: '{!! $happiness !!}'
            });
            $('.editable').editable();
            $('#memory-show').on('click', '.edit-info', function() {
                $(this).toggleText('取消编辑', '编辑记忆').toggleClass('btn-success');
                $('.editable').editable('toggleDisabled');
            });
            $('.editable').editable('toggleDisabled');
        });
    </script>

@endsection