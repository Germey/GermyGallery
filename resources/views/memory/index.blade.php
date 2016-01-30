@extends('manage.wrap')

@section('main')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>所有记忆</h5>

                        <div class="ibox-tools">
                            <a href="{{ url('/manage/memory/create') }}" class="btn btn-primary btn-xs">添加记忆</a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row m-b-sm m-t-sm">
                            <div class="col-md-1">
                                <a class="btn btn-white btn-sm" href="{{ url('/manage/memory') }}"><i
                                            class="fa fa-refresh"></i> 刷新
                                </a>
                            </div>
                            <div class="col-md-11">
                                {!! Form::open(['method' => 'GET']) !!}
                                <div class="input-group">
                                    {!! Form::text('title', @$paras['title'], ['class' => 'input-sm form-control', 'placeholder' => '输入记忆名称搜索']) !!}
                                    <span class="input-group-btn">
                                        {!! Form::submit('搜索',['class' => 'btn btn-sm btn-primary']) !!}
                                    </span>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <div class="project-list">
                            <table class="table table-hover">
                                <tbody>
                                @foreach($memories as $memory)
                                    <tr>
                                        <td class="project-status col-md-1">
                                            @if($tag = $memory->getFirstTag())
                                                <span class="label label-primary tag-list">{{ $tag }}</span>
                                            @endif
                                        </td>
                                        <td class="project-title">
                                            <a href="{{ url('/manage/memory/'.$memory->id) }}">{{ $memory->title }}</a>
                                        </td>
                                        <td>
                                            <p>
                                                {{ get_short($memory->description, 20) }}
                                            </p>
                                        </td>
                                        <td>
                                            <small><i class="fa fa-clock-o"></i>{{ $memory->date_start }}</small>
                                        </td>
                                        <td class="project-completion">
                                            <p><i class="fa fa-map-marker"></i>{{ $memory->location }}</p>
                                        </td>
                                        <td class="project-people">
                                            @foreach($memory->getImages->take(5) as $image)
                                                <img alt="{{ $image->title }}" class="img-circle"
                                                     src="{{ $image->path }}">
                                            @endforeach
                                        </td>
                                        <td class="project-actions">
                                            <a href="{{ url('/manage/memory/'.$memory->id) }}"
                                               class="btn btn-white btn-sm">
                                                <i class="fa fa-angle-double-right"></i>详情
                                            </a>
                                            {!! Form::open(['url' => '/manage/memory/'.$memory->id, 'method' => 'DELETE', 'class' => 'inline']) !!}
                                            {!! Form::hidden('para_string', http_build_query($paras)) !!}
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-remove"></i>删除
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-right">
                                <p>当前第{{ $memories->currentPage() }}页，共{{ $memories->lastPage() }}页</p>
                            </div>
                            <div class="pagination pull-right">
                                {!!  $memories->setPath('/manage/memory')->appends($paras)->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection