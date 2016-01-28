<div id="support-upload">
    {!! Html::style('/css/plugins/uploadify/uploadify.css') !!}
    {!! Html::script('/js/plugins/uploadify/jquery.uploadify.min.js') !!}
    <script>
        jQuery.fn.fileUpload = function() {
            function addItem(src, display) {
                var item = $('<div>').addClass('col-md-2 display-item');
                $('<img>').attr('src', src).appendTo(item);
                $('<input>').attr({
                    'type': 'hidden',
                    'name': 'images[path][]'
                }).val(src).appendTo(item);
                $('<input>').attr({
                    'name': 'images[title][]',
                    'type': 'text',
                    'placeholder': '添加标题',
                }).addClass('form-control m-t-sm').appendTo(item);
                $('<input>').attr({
                    'name': 'images[description][]',
                    'type': 'text',
                    'placeholder': '添加描述',
                }).addClass('form-control m-t-sm').appendTo(item);
                $('<button>').addClass('btn btn-danger btn-xs del-upload').html('<i class="fa fa-remove"></i>删除').appendTo(item);
                item.appendTo(display);
            }

            var ele = $(this);
            var display = $(ele.attr('display'));
            setTimeout(function() {
                ele.uploadify({
                    'formData': {
                        '_token': '{{ csrf_token() }}'
                    },
                    'buttonClass': 'btn btn-primary btn-upload',
                    'fileTypeDesc': 'Image Files',
                    'fileTypeExts': '*.gif; *.jpg; *.png',
                    'buttonText': '<i class="fa fa-upload"></i>上传图片',
                    'fileSizeLimit': '2MB',
                    'swf': '/swf/uploadify.swf',
                    'uploader': '/upload/img',
                    'onUploadSuccess': function(data, response) {
                        response = JSON.parse(response);
                        status = response.status;
                        switch (status) {
                            case '404':
                                alert('没有图片可以上传');
                                break;
                            case '403':
                                alert('格式不允许');
                                break;
                            case '500':
                                alert('文件错误，无法上传');
                                break;
                            case '200':
                                addItem(response.path, display);
                                break;
                        }
                    }
                });
            }, 0);
        }
        if ($('.uploadify').length > 0) {
            $('.uploadify').fileUpload();
        }
        $('.display-images').on('click', '.del-upload', function() {
            $(this).parents('.display-item').remove();
        });
    </script>
    <style>
        .uploadify {
            margin: 10px auto;
        }

        .btn-upload {
            display: block;
            width: 120px;
            margin: 10px auto;
            line-height: 15px !important;
        }

        .uploadify-queue-item {
            width: 400px;
            margin: 0 auto;
        }

        .del-upload {
            display: block;
            margin: 0 auto;
            margin-top: 10px;
            width: 90px;
        }

        .display-item img {
            width: 100%;
        }


    </style>
</div>
