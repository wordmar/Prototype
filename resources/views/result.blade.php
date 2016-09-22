@extends('master')
@section('title', 'Result')

@section('content')
    <h1>
        Result:{!! $result !!}
    </h1>

    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

@endsection