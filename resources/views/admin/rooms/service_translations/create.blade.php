@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Service Translation
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.serviceTranslations.store']) !!}

                        @include('admin.rooms.service_translations.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
