<!--Author: Adrian Alberto Gutierrez Leal-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.lesson.create.cardTitle')</div>
                @include('util.message')
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.lesson.save') }}">
                        @csrf
                        <input type="hidden"  name="course_id" value="{{$data["course_id"]}}" />
                        <label>@lang('messages.lesson.title')</label>
                        <br>
                        <input type="text"  name="title" placeholder="@lang('messages.lesson.titlePlaceholder')"/>
                        <br>
                        <label>@lang('messages.lesson.body')</label>
                        <br>
                        <textarea name="body"  cols="100" rows="5"> </textarea>
                        <button type="submit" class="btn btn-primary float-right">
                            @lang("messages.course.create.submit")
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection