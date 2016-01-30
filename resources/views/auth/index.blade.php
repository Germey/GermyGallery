<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $configs['title'] }} | 认证</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html"/>
    <![endif]-->

    {!! Html::style('/css/bootstrap.min.css') !!}
    {!! Html::style('/css/plugins/font-awesome/font-awesome.min.css') !!}
    {!! Html::style('/css/animate.min.css') !!}
    {!! Html::style('/css/style.css') !!}
    {!! Html::script('/js/jquery.min.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}

</head>

<body class="gray-bg">

<div class="lock-word animated fadeInDown">
</div>
<div class="middle-box text-center lockscreen animated fadeInDown">
    @include('manage.toast')
    <div>
        <div class="m-b-md">
            <img alt="image" class="img-circle circle-border" src="/img/a1.jpg">
        </div>
        <h3></h3>
        <p>请输入密钥</p>
        {!! Form::open(['url' => '/auth/', 'role' => 'form', 'class' => 'm-t']) !!}
            <div class="form-group">
                {!! Form::password('token', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '请输入管理密钥']) !!}
            </div>
            <button type="submit" class="btn btn-primary block full-width">认证</button>
        {!! Form::close() !!}
    </div>
</div>

</body>

</html>