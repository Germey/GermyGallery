<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $configs['title'] }} | {{ $configs['description'] }}</title>
    {!! Html::style('/css/main.css') !!}
    {!! Html::style('/css/cd-style.css') !!}
    {!! Html::style('/css/photo-anim.css') !!}
    {!! Html::style('/css/anim-init.css') !!}
    {!! Html::style('/css/anim.css') !!}
</head>

@define $bg_img = $configs['bg_img'] ? $configs['bg_img'] : '/img/background.jpg'
<body class="fix-bg" style="background-image: url('{!! $bg_img !!}')">
<div class="cd-content">
    <section id="cd-timeline" class="cd-container">
        @foreach($memories as $memory)
            <div class="cd-item">

                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-picture">
                        <img src="img/cd-icon-picture.svg" alt="Picture">
                    </div>

                    <div class="cd-timeline-content">
                        <h2>{{ $memory->title }}</h2>

                        <p>
                            {{ $memory->description }}
                        </p>
                    <span class="cd-date">
                        {{ $memory->date_start }}
                        {{ $memory->date_end ? ' - ' . $memory->date_end : '' }}
                    </span>
                        @if(count($memory->getImages))
                            <div class="albums-tab">
                                <div class="albums-tab-thumb sim-anim-{{ rand(1, 9) }}">
                                    @foreach($memory->getImages as $image)
                                        <img src="{{ $image->path }}" alt="{{ $image->title }}" class="all studio"/>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</div>
{!! Html::script('/js/jquery.min.js') !!}
{!! Html::script('/js/bootstrap.min.js') !!}
{!! Html::script('/js/anim.js') !!}
        <!--<div id="footer">-->
<!--<p>Powered by helloweba.com 允许转载、修改和使用本站的DEMO，但请注明出处：<a href="http://www.helloweba.com">www.helloweba.com</a></p>-->
<!--</div>-->
<style>


    .cd-timeline-img {
        box-shadow: 0 0 0 4px {!! $configs['icon_border_color'] !!}, inset 0 2px 0 rgba(0, 0, 0, 0.08), 0 3px 0 4px rgba(0, 0, 0, 0.05);
    }

    #cd-timeline::before {
        background: {!! $configs['bar_color'] !!};
    }

    .cd-date {
        color: {!! $configs['date_color'] !!};
    }

    .cd-timeline-content h2 {
        color: {!! $configs['title_color'] !!};
    }

    .cd-timeline-img img {
        opacity: 0.5;
    }

    .cd-timeline-content p {
        color: {!! $configs['description_color'] !!};
    }

    /* content */
    .cd-timeline-content {
        background-color: {!! $configs['panel_color'] !!};
        box-shadow: 0 3px 0 {!! $configs['panel_color'] !!};
    }

    /* tri */
    @media only screen and (max-width: 1169px) {
        .cd-timeline-content::before {
            border-right: 7px solid {!! $configs['panel_color'] !!};
        }
    }

    @media only screen and (min-width: 1170px) {
        .cd-item:nth-child(even) .cd-timeline-block .cd-timeline-content::before {
            border-right-color: {!! $configs['panel_color'] !!};
        }

        .cd-timeline-content::before {
            border-left-color: {!! $configs['panel_color'] !!};
        }
    }

</style>
</body>
</html>