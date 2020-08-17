<div class="tab-pane {{$tab==2?'active':''}}" id="searchuser">
    <div id="render-result">
        <div class="widget-extra themed-background">
            <h2 class="text-center">{{ $tags['back_role_searchuser_title'] }}</h2>
        </div>
        
        <div class="widget-extra-full">
            {!! Form::open(['route' => 'admin.search.user', 'method' => 'post', 'class'=>'searchuser']) !!}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> {{ $tags['back_general_ricerca'] }}</button>
                            </span>
                            <input type="text" name="email" class="form-control" placeholder="{{ $tags['back_general_email'] }}">
                            <input type="hidden" name="tab" value="{{$formtab}}">
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="space"></div>
    </div>
</div>