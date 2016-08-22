@extends('master')
@section('title', 'Show')

@section('content')
    <h1>
        Show
    </h1>
    <fieldset>
        <fieldset>
            <label for="title">Title</label>
            <div>
                {!! $requirement->title !!}
            </div>
        </fieldset>
        <fieldset>
            <label for="content">Content</label>
            <div>
                {!! $requirement->content !!}
            </div>
        </fieldset>
    </fieldset>
    <form method="post" action="{!! action('RequirementsController@edit', $requirement->req_id) !!}">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div>
            <button type="submit">前往編輯畫面</button>
        </div>
    </form>
    <form method="post" action="{!! action('RequirementsController@destroy', $requirement->req_id) !!}">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div>
            <button type="submit">刪除</button>
        </div>
    </form>
@endsection