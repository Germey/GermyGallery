@extends('manage.wrap')

@section('main')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>所有事件</h5>
                        <div class="ibox-tools">
                            <a href="{{ url('/manage/memory/create') }}" class="btn btn-primary btn-xs">创建新项目</a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row m-b-sm m-t-sm">
                            <div class="col-md-1">
                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> 刷新</button>
                            </div>
                            <div class="col-md-11">
                                <div class="input-group">
                                    <input type="text" placeholder="请输入项目名称" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                </div>
                            </div>
                        </div>

                        <div class="project-list">
                            <table class="table table-hover">
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td class="project-status">
                                            <span class="label label-primary">进行中</span>
                                        </td>
                                        <td class="project-title">
                                            <a href="{{ url('/manage/event/'.$event->id) }}">{{ $event->title }}</a>
                                            <br/>
                                            <small>创建于 {{ $event->created_at }}</small>
                                        </td>
                                        <td class="project-completion">

                                        </td>
                                        <td class="project-people">

                                        </td>
                                        <td class="project-actions">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection