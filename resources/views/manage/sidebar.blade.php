<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            @foreach($menu_items as $menu_item)
                <li>
                    <a href="{{ url('/manage/'.@$menu_item['path']) }}">
                        <i class="fa fa-{{ @$menu_item['icon'] }}"></i>
                        <span class="nav-label">{{ @$menu_item['text'] }}</span>
                        @if (@$menu_item['children'])
                            <span class="fa arrow"></span>
                        @endif
                    </a>
                    @if ($children = @$menu_item['children'])
                        <ul class="nav nav-second-level">
                            @foreach($children as $child)
                                <li>
                                    <a href="{{ url('/manage/'.@$menu_item['path'].'/'.@$child['path']) }}">
                                        <i class="fa fa-{{ @$child['icon'] }}"></i>
                                        <span class="nav-label">{{ @$child['text'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</nav>