@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Newsletter User
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($newsletterUser, ['route' => ['admin.newsletterUsers.update', $newsletterUser->id], 'method' => 'patch']) !!}

                        @include('admin.newsletter_users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection