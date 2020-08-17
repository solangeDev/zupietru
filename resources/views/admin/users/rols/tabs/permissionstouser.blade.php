<div class="widget-extra themed-background">
    <h2 class="text-center">{{ $tags['back_role_permissionstouser_title'] }}</h2>
</div>

<div class="widget-extra-full">
    @if(isset($user))
        {!! Form::model($user,['route' => ['admin.permissionstouser'], 'method' => 'post', 'class'=>"form-permissionstouser"]) !!}

            {!! Form::hidden('user_id', $user->id, ['class' => 'form-control']) !!}

            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <h2 class="text-center">{{$user->name}}</h2>
                </div>
                @php $module="" @endphp
                <h3>{{ $tags['back_role_permissionstorole_form_title_permissions'] }}</h3>

                @foreach($permissions as $permission => $value)
                    <div class="form-group">
                        @if($value->module->name != $module)
                            <div class="text-center">Module - <label>{{ $value->module->name }}</label></div><hr>
                        @endif
                        @php $module = $value->module->name @endphp
                        <label>
                            {!! Form::checkbox('permission_slug[]', $value->slug, $user->can($value->slug)) !!} {{ $value->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="col-md-6 col-md-offset-3 space">
                {!! Form::submit($tags['back_general_save'], ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    @endif
</div>
