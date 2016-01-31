$(function() {
    var height = $(window).width();
    var container;
    container = height >= 1170 ? $('.cd-timeline-block') : $('.cd-timeline-content');
    container.addClass('init-rotate', 1000)
    setTimeout(function() {
        container.removeClass('init-rotate');
    }, 1500);
    $.each($('.albums-tab-thumb'), function(index, ele) {
        console.log(index);
        var anim_class = 'init-' + $(ele).attr('class').split(' ')[1];
        console.log(anim_class);
        setTimeout(function() {
            $(ele).addClass(anim_class);
            setTimeout(function() {
                $(ele).removeClass(anim_class);
            }, 1000);
        }, 1500 + (index + 1) * 1000);
    });
});