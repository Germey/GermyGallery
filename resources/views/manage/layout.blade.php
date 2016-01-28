<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <title>H+ 后台主题UI框架 - 主页</title>

    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html"/>
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    {!! Html::style('/css/bootstrap.min.css') !!}
    {!! Html::style('/css/plugins/font-awesome/font-awesome.min.css') !!}
    {!! Html::style('/css/animate.min.css') !!}
    {!! Html::style('/css/style.css') !!}
    {!! Html::script('/js/jquery.min.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
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


