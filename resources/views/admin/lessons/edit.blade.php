<!--Author: Adrian Alberto Gutierrez Leal-->
@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
	    @include('util.message')
            @if($errors->any())
            <div class="alert alert-warning" role="alert">
                <ul id="errors">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-header">@lang('messages.lesson.edit.cardTitle')</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.lesson.update',['id'=>$data['lesson']->getId()])}}">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$data['lesson']->getCourseId()}}" />
                        <div class="form-group">
                            <label>@lang('messages.lesson.title')</label>
                            <input type="text" class='form-control'  name="title" placeholder="{{$data['lesson']->getTitle()}}"
                                value="{{ old('title', $data['lesson']->getTitle()) }}"/>
                        </div>
                        <div class="form-group">
                            <label>@lang('messages.lesson.body')</label>
                            <textarea name="body" id="body" cols="30" rows="3" class="form-control"
                                placeholder="{{$data['lesson']->getBody()}}">{{ old('body', $data['lesson']->getBody()) }}</textarea>
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
