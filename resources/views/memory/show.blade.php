@extends('manage.wrap')
@section('main')

    <div class="row">
        <div class="col-sm-9">
            <div class="wrapper wrapper-content animated fadeInUp left">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="m-b-md">
                                    <h2>{{ $memory->title }}</h2>
                                </div>
                                <dl class="dl-horizontal">
                                    <dt>状态：</dt>
                                    <dd><span class="label label-primary">进行中</span>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <dl class="dl-horizontal">


                                </dl>
                            </div>
                            <div class="col-sm-7" id="cluster_info">
                                <dl class="dl-horizontal">
                                    <dt>更新于：</dt>
                                    <dd>{{ $memory->updated_at }}</dd>
                                    <dt>发布于：</dt>
                                    <dd>{{ $memory->created_at }}</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <dl class="dl-horizontal">
                                    <dt>幸福指数</dt>
                                    <dd>
                                        <div class="progress progress-striped active m-b-sm">
                                            <div style="{{ 'width:'.number_format(intval($memory->status)*100/3, 0, '.', '').'%;' }}" class="progress-bar"></div>
                                        </div>
                                        <small>当前已完成项目总进度的 <strong>{{ number_format(intval($memory->status)*100/3, 0, '.', '') }}</strong>%</small>
                                    </dd>
                                </dl>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="wrapper wrapper-content project-manager right">
                <div class="ibox">
                    <div class="ibox-content">
                        <h4>招募描述</h4>
                        <img src="{{ $memory->image }}" class="img-responsive">
                        <p class="small">
                            <br>{{ $memory->brief }}
                        </p>
                        <p class="small font-bold">
                            <span><i class="fa fa-circle text-warning"></i> 详细描述</span>
                            <br>{{ $memory->detail }}
                        </p>
                        <h5>招募标签</h5>
                        <ul class="tag-list clearfix" style="padding: 0">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection