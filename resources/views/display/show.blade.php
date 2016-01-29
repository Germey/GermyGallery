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

                    <div class="albums-tab">
                        <div class="albums-tab-thumb sim-anim-6">
                            @foreach($memory->getImages as $image)
                                <img src="{{ $image->path }}" alt="{{ $image->title }}" class="all studio"/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
<!--<div id="footer">-->
<!--<p>Powered by helloweba.com 允许转载、修改和使用本站的DEMO，但请注明出处：<a href="http://www.helloweba.com">www.helloweba.com</a></p>-->
<!--</div>-->
</body>
</html>