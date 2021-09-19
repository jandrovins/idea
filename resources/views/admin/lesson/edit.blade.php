<!--Author: Adrian Alberto Gutierrez Leal-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["title"] }}</div>
                @include('util.message')
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.lesson.update',['id'=>$data['lesson']->getId()])}}">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$data['lesson']->getCourseId()}}" />
                        <label>@lang('lang.title_label')</label>
                        <br>
                        <input type="text" name="title" placeholder="{{$data['lesson']->getTitle()}}" />
                        <br>
                        <label>@lang('lang.body_label')</label>
                        <br>
                        <textarea name="body" placeholder="{{$data['lesson']->getBody()}}" cols="100" rows="5"> </textarea>
                        <input type="submit" value="@lang('lang.submit_bttn')" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection