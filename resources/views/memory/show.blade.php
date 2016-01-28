@extends('manage.wrap')
@section('main')
    <div class="wrapper wrapper-content">
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
                                    <dt>类别：</dt>
                                    <dd><span class="label label-primary">进行中</span>
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
                                                 class="progress-bar"></div>
                                        </div>
                                        <small>当前幸福指数为
                                            <strong>{{ $memory->happiness }}</strong>
                                            点
                                        </small>
                                    </dd>
                                </dl>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>记忆详情</h5>
                    </div>
                    <div class="ibox-content">

                        <h3>{{ $memory->title }}</h3>

                        <p>
                            {{ $memory->description }}
                        </p>
                        @if($memory->location)
                            <p>
                                <i class="fa fa-map-marker"></i>
                                {{ $memory->location }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection