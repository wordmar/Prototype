@extends('master')
@section('title', 'Create')
@section('content')
    <h1>
        Create
    </h1>
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    <form method="post" action="/store">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <fieldset>
            <label for="title">Title</label>
            <div>
                {{--<input type="text" id="title" name="title" value="Title">--}}
                <input type="text" id="title" name="title" value="">
            </div>
            <label for="content">Content</label>
            <div>
                {{--<textarea rows="3" id="content" name="content">Content</textarea>--}}
                <textarea rows="3" id="content" name="content"></textarea>
            </div>
            <div>
                <button type="submit">新增需求</button>
            </div>
        </fieldset>
    </form>
@endsection