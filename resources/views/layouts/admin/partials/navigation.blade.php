<li class="{{ Request::is('admin/config/access*') ? 'active' : '' }}">
    <a href="javascript:void(0)" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-saw_blade sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Example Item</span></a>
    <ul>
       <li>
            <a href="javascript:void(0)" class="{{ Request::is('admin/*') ? 'active' : '' }}"><span>Example Sub-Item</span></a>
        </li>
    </ul>
</li>
