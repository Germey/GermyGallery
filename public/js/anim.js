$(function() {
    $('.cd-content').on('mouseenter', '.cd-item', function() {
        var item = $(this);
        setTimeout(function() {
            item.find('.albums-tab-thumb').trigger('mouseenter');
        }, 1000);
    });
});