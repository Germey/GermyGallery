<div id="right-sidebar">
    <div class="sidebar-container">

        <ul class="nav nav-tabs navs-3">

            <li class="active">
                <a data-toggle="tab" href="#tab-1">
                    <i class="fa fa-gear"></i> 主题
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="sidebar-title">
                    <h3><i class="fa fa-comments-o"></i> 主题设置</h3>
                </div>
                <div class="skin-settings">
                    <div class="title">主题设置</div>
                    <div class="setings-item">
                        <span>收起左侧菜单</span>

                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox"
                                       id="collapsemenu">
                                <label class="onoffswitch-label" for="collapsemenu">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span>固定顶部</span>

                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                <label class="onoffswitch-label" for="fixednavbar">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                                <span>
                        固定宽度
                    </span>

                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                <label class="onoffswitch-label" for="boxedlayout">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="title">皮肤选择</div>
                    <div class="setings-item choose-skin default-skin nb" data-name="default-skin">
                                <span class="skin-name ">
                         <a href="#" class=" s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                    </div>
                    <div class="setings-item choose-skin blue-skin nb" data-name="blue-skin">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                    </div>
                    <div class="setings-item choose-skin yellow-skin nb" data-name="yellow-skin">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色主题
                        </a>
                    </span>
                        {!! Form::token() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(function() {
        $('.skin-settings').on('click', '.choose-skin', function() {
            $(this).find('a').trigger('click');
            $.post('/manage/config/skin', {
                'key': 'skin',
                'value': $(this).data('name'),
                '_token': $('input[name="_token"]').val(),
            }, function() {
            });
        });
        setTimeout(function() {
            $('.' + '{!! $skin !!}').find('a').trigger('click');
        }, 10);
    });
</script>