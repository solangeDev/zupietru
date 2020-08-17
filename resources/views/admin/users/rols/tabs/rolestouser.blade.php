<div class="widget-extra themed-background">
    <h2 class="text-center">{{ $tags['back_role_rolestouser_title'] }}</h2>
</div>

<div class="widget-extra-full">
    @if(isset($user))
        {!! Form::model($user,['route' => ['admin.rolestouser'], 'method' => 'post']) !!}

            {!! Form::hidden('user_id', $user->id, ['class' => 'form-control']) !!}

            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <h2 class="text-center">{{$user->name}}</h2>
                </div>
                <h3>{{ $tags['back_role_permissionstorole_form_title_role'] }}</h3>

                @foreach($roles as $role => $value)
                <div class="form-group">
                    <label>
                        {!! Form::checkbox('role_slug[]', $role, $user->isRole($role)) !!} {{ $value }}
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
