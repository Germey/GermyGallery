<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <title>{{ $configs['title'] }} | 管理界面</title>
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html"/>
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    {!! Html::style('/css/bootstrap.min.css') !!}
    {!! Html::style('/css/plugins/font-awesome/font-awesome.min.css') !!}
    {!! Html::style('/css/animate.min.css') !!}
    {!! Html::style('/css/style.css') !!}
    {!! Html::style('/css/manage.css') !!}
    {!! Html::script('/js/jquery.min.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::script('/js/functions.js') !!}
</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
@include('manage.sidebar')
@yield('wrap')
@include('manage.options')
{!! Html::script('/js/plugins/metisMenu/jquery.metisMenu.js') !!}
{!! Html::script('/js/plugins/slimscroll/jquery.slimscroll.min.js') !!}
{!! Html::script('/js/plugins/layer/layer.min.js') !!}
{!! Html::script('/js/hplus.min.js') !!}
{!! Html::script('/js/contabs.min.js') !!}
{!! Html::script('/js/plugins/pace/pace.min.js') !!}
</body>

</html>


