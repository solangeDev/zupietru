@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Room Category Translation
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.rooms.room_category_translations.show_fields')
                    <a href="{!! route('admin.roomCategoryTranslations.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
