<!--Author: Adrian Alberto Gutierrez Leal-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('lang.create_lesson'): {{$data['course']->getTitle()}}</div>
                @include('util.message')
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.lesson.save') }}">
                        @csrf
                        <input type="hidden"  name="course_id" value="{{$data["course_id"]}}" />
                        <label>@lang('lang.title_label')</label>
                        <br>
                        <input type="text"  name="title" placeholder="@lang('lang.title_ph')"/>
                        <br>
                        <label>@lang('lang.body_label')</label>
                        <br>
                        <textarea name="body" placeholder="@lang('lang.body_ph')" cols="100" rows="5"> </textarea>
                        <input type="submit" value="@lang('lang.submit_bttn')" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection