@extends('master')
@section('title', 'ShowAll')

@section('content')
            <div class="panel-heading">
                <h2> 已提需求列表 </h2>
            </div>
            @if ($requirements->isEmpty())
                <p> 目前沒有需求.</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>Requirement ID</th>
                        <th>Title</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requirements as $requirement)
                        <tr>
                            <td>{!! $requirement->req_id !!} </td>
                            <td>
                                <a href="{!! action('RequirementsController@show', $requirement->req_id) !!}">{!! $requirement->title !!} </a>
                            </td>
                            <td>{!! $requirement->user_id !!} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
@endsection