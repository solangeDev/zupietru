@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            User Address
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.users.user_addresses.show_fields')
                    <a href="{!! route('admin.userAddresses.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
