@extends('layout.main')


@section('content')
    <div class="card">
        <div class="card-body">
            @include('endereco.' . $options['viewName'])
        </div>
    </div>
@endsection
