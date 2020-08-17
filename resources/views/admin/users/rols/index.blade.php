@extends('layouts.admin.app')

@section('content')
    @include('layouts.admin.partials.dashboard-header-top', [
        'title'         => $tags['back_role_title'], 
        'subtitle'      => '',
        'icon'          => 'fa fa-cogs',
        'route'         => 'admin.rols.create',
        'breadcrumb'    => array (
            array (
                'title' => $tags['back_general_home'],
                'route' => 'home'
            ),
            array (
                'title' => $tags['back_role_title'],
            ),
        ), 
        ])
    @include('admin.users.rols.table', [
        'roles'=>$roles, 
        'permissions'=>$permissions, 
        'tab' => $tab
    ])
@endsection

@section('js')
    <script type="text/javascript">
        $('.permissionstorole').on('click', function() {
            $(':checkbox').prop('checked',false);
            $.get('/lookuppermissionsofrole/'+this.value, function(data, status){
                $.each(data, function( index, value ) {
                    if($('#permissionstorole'+value).val()==value){
                        $('#permissionstorole'+value).prop('checked',true);
                    }
                })
            });
        });

        $('.searchuser').submit(function(event) {
            event.preventDefault();
            var $form = $( this ),
                data = $form.serialize(),
                url = $form.attr( "action" );

            var send = $.post( url, data);

            send.done(function( data ) {
                $('#render-result').empty().append(data);
            });
        });
    </script>
@endsection