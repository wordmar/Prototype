@extends('master')
@section('title', 'Edit')

@section('content')
    <h1>
        Edit
    </h1>

    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

    <form method="post" action="/requirements/{!! $requirement->req_id !!}/update">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <fieldset>
            <label for="title">Title</label>
            <div>
                <input type="text" id="title" name="title" value="{!! $requirement->title !!}">
            </div>
            <label for="content">Content</label>
            <div>
                <textarea rows="3" id="content" name="content">{!! $requirement->content !!}</textarea>
            </div>
            <div>
                <button type="submit">Update</button>
            </div>
        </fieldset>
    </form>
@endsection