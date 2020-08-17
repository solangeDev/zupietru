@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Blog Translation
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.blogTranslations.store']) !!}

                        @include('admin.blogs.blog_translations.fields')

                    {!! Form::close() !!}
                </div>

                {{--@if(!empty($filesDB))
                    @if(!empty($object))
                        {!! Form::open(['route' => 'admin.modal_galery.galery.saveGaleryOfStorage']) !!}
                        @include('admin.modal_galery.galeryStorage', ['galery' => $filesDB,'ruta' => 'admin.modal_galery.galery.saveGaleryOfStorage','id' => $object->id])
                        {!! Form::close() !!}
                    @endif
                @endif--}}

            </div>
        </div>
    </div>
@endsection
