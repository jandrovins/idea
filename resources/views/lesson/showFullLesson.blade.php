<!--Author: Adrian Alberto Gutierrez Leal-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>{{$data['title']}}</h1>
                <p>{{$data['lesson']->getBody()}}</p>
                <!--Back to Home Button-->
                <form action="{{ route('lesson.show') }}">
                    <button type="submit" class="btn btn-primary"> @lang('lang.back_bttn')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection