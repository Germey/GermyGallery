<div id="support-datepicker">
    {!! Html::style('/css/plugins/datepicker/datepicker.css') !!}
    {!! Html::script('/js/plugins/datepicker/bootstrap-datepicker.js') !!}
    <script>
        $(function() {
            if ($('.datepicker').length > 0) {
                $('.datepicker').datepicker();
            }
        });
    </script>
</div>

