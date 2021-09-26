<!--Author: Adrian Alberto Gutierrez Leal-->
@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">@lang('messages.lesson.create.cardTitle')</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.lesson.save') }}">
                        @csrf
                        <input type="hidden"  name="course_id" value="{{$data["course_id"]}}" />
                        <div class="form-group">
                            <label>@lang('messages.lesson.title')</label>
                            <input type="text" class='form-control'  name="title" placeholder="@lang('messages.lesson.titlePlaceholder')"/>
                        </div>
                        <div class="form-group">
                            <label>@lang('messages.lesson.body')</label>
                            <textarea name="body" id="body" cols="30" rows="3" class="form-control"
                                placeholder="@lang("messages.lesson.titlePlaceholder")"
                                value="{{ old('body') }}"></textarea>
                        </div>
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
