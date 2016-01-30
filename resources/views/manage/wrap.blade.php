@extends('manage.layout')
@section('wrap')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars m-r-none"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown hidden-xs">
                        <a class="right-sidebar-toggle" aria-expanded="false">
                            <i class="fa fa-tasks"></i>主题
                        </a>
                    </li>
                    <li class="hidden-xs">
                        <a href="/auth/logout"><i class="fa fa-sign-out"></i>
                            登出</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row J_mainContent" id="content-main">
            <div class="main">
                @include('manage.toast')
                @yield('main')
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">{{ $configs['title'] }}丨{{ $configs['description'] }}
            </div>
        </div>
    </div>
@endsection