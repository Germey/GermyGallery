<div id="color-picker">
    {!! Html::style('/css/plugins/colorpicker/css/bootstrap-colorpicker.min.css') !!}
    {!! Html::script('/js/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}
    <script>
        $(".colorpicker").colorpicker();
    </script>
    <style>
        .colorpicker::before {
            display: none;
        }
    </style>
</div>