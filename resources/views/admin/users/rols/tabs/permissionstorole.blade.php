<div class="tab-pane {{$tab==1?'active':''}}" id="permissionstorole">
    <div class="widget-extra themed-background">
        <h2 class="text-center">{{ $tags['back_role_permissionstorole_title'] }}</h2>
    </div>

    <div class="widget-extra-full">
        {!! Form::open(['route' => 'admin.permissionstorole', 'method' => 'post', 'id'=>'form-permissionstorole']) !!}
            <div class="col-md-6">
                <h3>{{ $tags['back_role_permissionstorole_form_title_role'] }}</h3>
                @foreach($roles as $role => $value)
                <div class="form-group">
                    <label>
                        {!! Form::radio('role_slug', $role, false, ['class'=>'permissionstorole']) !!} {{ $value }}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="col-md-6">
                <h3>{{ $tags['back_role_permissionstorole_form_title_permissions'] }}</h3>
                @foreach($permissions as $permission => $value)
                    <div class="form-group">
                        @if($value->module->name != $module)
                            <div class="text-center">Module - <label>{{ $value->module->name }}</label></div><hr>
                        @endif
                        @php 
                            $module = $value->module->name;
                        @endphp
                        <label>
                            {!! Form::checkbox('permission_slug[]', $value->slug, false, ['id'=>'permissionstorole'.$value->slug]) !!} {{ $value->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="col-md-6 col-md-offset-3 space">
                {!! Form::submit($tags['back_general_save'], ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>