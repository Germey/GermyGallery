<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeGallery</title>
    {!! Html::style('/css/main.css') !!}
    {!! Html::style('/css/cd-style.css') !!}
    {!! Html::style('/css/photo-anim.css') !!}
    {!! Html::style('/css/anim.css') !!}
</head>

<body>
<div class="fix-bg blur" style="background: url('/img/background.jpg')">
</div>
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
                                <div class="albums-tab-thumb sim-anim-6">
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
<!--<div id="footer">-->
<!--<p>Powered by helloweba.com 允许转载、修改和使用本站的DEMO，但请注明出处：<a href="http://www.helloweba.com">www.helloweba.com</a></p>-->
<!--</div>-->
<style>

    .cd-timeline-content {
        background-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 3px 0 rgba(255, 255, 255, 0.3);
    }

    .cd-timeline-img {
        box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.3), inset 0 2px 0 rgba(0, 0, 0, 0.08), 0 3px 0 4px rgba(0, 0, 0, 0.05);
    }

    #cd-timeline::before {
        background: rgba(255, 255, 255, 0.3);
    }

    .cd-date {
        color: #EEE;
    }

    .cd-timeline-content h2 {
        color: #eee;
    }

    .cd-timeline-img img {
        opacity: 0.5;
    }

    .cd-timeline-content p {
        color: #F1F1F1;
    }

    @media only screen and (max-width: 1169px) {
        .cd-timeline-content::before {
            border-right: 7px solid rgba(255, 255, 255, 0.3);;
        }
    }

    @media only screen and (min-width: 1170px) {
        .cd-item:nth-child(even) .cd-timeline-block .cd-timeline-content::before {
            border-right-color: rgba(255, 255, 255, 0.3);
        }

        .cd-timeline-content::before {
            border-left-color: rgba(255, 255, 255, 0.3);
        }
    }

</style>
</body>
</html>