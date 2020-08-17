<li class="{{
    Request::is('permissionstorole*') ||
    Request::is('permissionstouser*') ||
    Request::is('permissionstouser*') ||
    Request::is('rolestouser*')
      ? 'active' : '' }}">
    <a href="javascript:void(0)" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-saw_blade sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ $tags['back_menu_users_title'] }}</span></a>
    <ul>
        <li>
            <a href="{!! route('admin.permissionstorole') !!}" class="{{ Request::is('permissionstorole*') ? 'active' : '' }}"><span>{{ $tags['back_menu_users_permission_to_role'] }}</span></a>
        </li>

        <li>
            <a href="{!! route('admin.permissionstouser') !!}" class="{{ Request::is('permissionstouser*') ? 'active' : '' }}"><span>{{ $tags['back_menu_users_permission_to_user'] }}</span></a>
        </li>

        <li>
            <a href="{!! route('admin.rolestouser') !!}" class="{{ Request::is('rolestouser*') ? 'active' : '' }}"><span>{{ $tags['back_menu_users_roles_to_user']}}</span></a>
        </li>
    </ul>
</li>

<li class="{{
    Request::is('products*') ||
    Request::is('productCategories*') ||
    Request::is('productSubcategories*') ||
    Request::is('brands*')
      ? 'active' : '' }}">
    <a href="#" class="sidebar-nav-menu">
        <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
        <i class="gi gi-certificate sidebar-nav-icon"></i>
        <span class="sidebar-nav-mini-hide">{{ $tags['back_products_title'] }}</span>
    </a>
    <ul>
        <li>
            <a href="{{ route('admin.products.index') }}">{{ $tags['back_products_title'] }}</a>
        </li>
        {{-- <li>
            <a href="{{ route('admin.productAdditionals.index') }}">{{ $tags['back_product_additionals_title'] }}</a>
        </li> --}}
        <li>
            <a href="{{ route('admin.productCategories.index') }}">{{ $tags['back_product_categories_title'] }}</a>
        </li>
        <li>
            <a href="{{ route('admin.productSubcategories.index') }}">{{ $tags['back_product_subcategories_title'] }}</a>
        </li>
        <li>
            <a href="{{ route('admin.brands.index') }}">{{ $tags['back_brand_title'] }}</a>
        </li>
        <li>
            <a href="{{ route('admin.productPresentations.index') }}">{{ $tags['back_product_presentations_title'] }}</a>
        </li>
    </ul>
</li>

<li>
    <a href="#" class="sidebar-nav-menu">
        <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
        <i class="gi gi-certificate sidebar-nav-icon"></i>
        <span class="sidebar-nav-mini-hide">{{ $tags['back_orders_title'] }}</span>
    </a>
    <ul>
        <li>
            <a href="{{ route('admin.orders.index') }}">{{ $tags['back_orders_title'] }}</a>
        </li>
    </ul>
</li>

<li class="{{
    Request::is('bookings*') ||
    Request::is('bookingDetails*')
      ? 'active' : '' }}">
    <a href="#" class="sidebar-nav-menu">
        <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
        <i class="fa fa-bookmark sidebar-nav-icon"></i>
        <span class="sidebar-nav-mini-hide">Booking and Request</span>
    </a>
    <ul>
        <li class="{{ Request::is('requests*') ? 'active' : '' }}">
            <a href="{!! route('admin.requests.index') !!}"><span>{{ $tags['back_requests_title'] }}</span></a>
        </li>

    </ul>
</li>

<li class="{{
    Request::is('eventCategories*') ||
    Request::is('events*')
      ? 'active' : '' }}">
    <a href="#" class="sidebar-nav-menu">
        <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
        <i class="fa fa-bookmark sidebar-nav-icon"></i>
        <span class="sidebar-nav-mini-hide">{{ $tags['back_event_title'] }}</span>
    </a>
    <ul>
        <li class="{{ Request::is('eventCategories*') ? 'active' : '' }}">
            <a href="{!! route('admin.eventCategories.index') !!}"><span>{{ $tags['back_event_categories_title'] }}</span></a>
        </li>

        <li class="{{ Request::is('events*') ? 'active' : '' }}">
            <a href="{!! route('admin.events.index') !!}"><span>{{ $tags['back_event_title'] }}</span></a>
        </li>
    </ul>
</li>

<li>
    <a href="#" class="sidebar-nav-menu">
        <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
        <i class="fa fa-envelope sidebar-nav-icon"></i>
        <span class="sidebar-nav-mini-hide">{{ $tags['back_requests_title'] }}</span>
    </a>
    <ul>
        <li class="{{ Request::is('newsletterUsers*') ? 'active' : '' }}">
            <a href="{!! route('admin.newsletterUsers.index') !!}"><span>{{ $tags['back_newslettes_title'] }}</span></a>
        </li>
        <li class="{{ Request::is('requests*') ? 'active' : '' }}">
            <a href="{!! route('admin.requests.index') !!}"><span>{{ $tags['back_requests_title'] }}</span></a>
        </li>
    </ul>
</li>




{{--<li class="{{ Request::is('activityCategoryTranslations*') ? 'active' : '' }}">
    <a href="{!! route('admin.activityCategoryTranslations.index') !!}"><i class="fa fa-edit"></i><span>Activity Category Translations</span></a>
</li>

<li class="{{ Request::is('activityTranslations*') ? 'active' : '' }}">
    <a href="{!! route('admin.activityTranslations.index') !!}"><i class="fa fa-edit"></i><span>Activity Translations</span></a>
</li>

<li class="{{ Request::is('productTranslations*') ? 'active' : '' }}">
    <a href="{!! route('admin.products.index') !!}"><i class="fa fa-edit"></i><span>Product Translations</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('admin.orders.index') !!}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>

<li class="{{ Request::is('orderDetails*') ? 'active' : '' }}">
    <a href="{!! route('admin.orderDetails.index') !!}"><i class="fa fa-edit"></i><span>Order Details</span></a>
</li>

<li class="{{ Request::is('serviceCategoryTranslations*') ? 'active' : '' }}">
    <a href="{!! route('admin.serviceCategoryTranslations.index') !!}"><i class="fa fa-edit"></i><span>Service Category Translations</span></a>
</li>

<li class="{{ Request::is('serviceTranslations*') ? 'active' : '' }}">
    <a href="{!! route('admin.serviceTranslations.index') !!}"><i class="fa fa-edit"></i><span>Service Translations</span></a>
</li>--}}

{{--<li class="{{ Request::is('multimedia*') ? 'active' : '' }}">
    <a href="{!! route('admin.multimedia.index') !!}"><i class="fa fa-edit"></i><span>Multimedia</span></a>
</li>

<li class="{{ Request::is('seoTranslations*') ? 'active' : '' }}">
    <a href="{!! route('admin.seoTranslations.index') !!}"><i class="fa fa-edit"></i><span>Seo Translations</span></a>
</li>--}}

<li class="{{ Request::is('tagTranslations*') ? 'active' : '' }}">
    <a href="{!! route('admin.tagTranslations.index') !!}"><i class="fa fa-edit"></i><span>Tag Translations</span></a>
</li>

{{--<li class="{{ Request::is('productPresentationProducts*') ? 'active' : '' }}">
    <a href="{!! route('admin.productPresentationProducts.index') !!}"><i class="fa fa-edit"></i><span>Product Presentation Products</span></a>
</li>--}}



