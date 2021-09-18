<!--Author: Adrian Alberto Gutierrez Leal-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
    <div class="container">
        <h1>{{$data['title']}}</h1>
        <p>{{$data['lesson']->getBody()}}</p>
        <!--Back to Home Button-->
        <form action="{{ route('lesson.show') }}">
            <button type="submit" class="btn btn-primary" style="background-color:grey"> Back</button>
        </form>
    </div>
@endsection