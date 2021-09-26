<!--Author: Adrian Alberto Gutierrez Leal-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">@lang('messages.lesson.edit.cardTitle')</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.lesson.update',['id'=>$data['lesson']->getId()])}}">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$data['lesson']->getCourseId()}}" />
                        <div class="form-group">
                            <label>@lang('messages.lesson.title')</label>
                            <input type="text" class='form-control'  name="title" placeholder="{{$data['lesson']->getTitle()}}"/>
                        </div>
                        <div class="form-group">
                            <label>@lang('messages.lesson.body')</label>
                            <textarea name="body" id="body" cols="30" rows="3" class="form-control"
                                placeholder="{{$data['lesson']->getBody()}}"
                                value="{{ old('body') }}"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">
                            @lang("messages.course.edit.submit")
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection