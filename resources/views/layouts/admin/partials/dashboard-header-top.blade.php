<!-- Draggable Blocks Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            @if(isset($button))
                <a class="btn btn-primary pull-right" style="margin-bottom: 5px" href="{!! route($route) !!}">{{ $button }}</a>
            @else
                <i class="{{ $icon }}"></i>
            @endif
            {{ $title }}<br><small>{{ $subtitle }}</small>
        </h1>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    @foreach($breadcrumb as $key => $value)
        @if((count($breadcrumb)-1) == $key)
            <li>{{ $value['title'] }}</li>
        @else
            <li><a href="{{ route(  $value['route'], (array_key_exists('route_params', $value)?$value['route_params']:[])  ) }}">{{ $value['title'] }}</a></li>
        @endif
    @endforeach
</ul>
<!-- END Draggable Blocks Header -->

<div class="clearfix"></div>

    @include('flash::message')

<div class="clearfix"></div>