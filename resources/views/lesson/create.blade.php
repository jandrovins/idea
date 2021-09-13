@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('home.index') }}">
                    <button type="submit" class="btn btn-primary"
                        style="background-color:grey">@lang('lang.back_bttn')</button>
                </form>
                <div class="card-header">{{ $data["title"] }}</div>
                @include('util.message')
                <div class="card-body">
                    <form method="POST" action="{{ route('lesson.save') }}">
                        @csrf
                        @if($data["course"]!=NULL)
                            <label>@lang('lang.course_label')</label>
                            <br>
                            <input type="text" placeholder="Enter id" name="course_id" placeholder="Short Title" value="{{$data["course"]}}" />
                            <br>
                        @else
                            <label>@lang('lang.course_label')</label>
                            <br>
                            <input type="text" placeholder="Enter id" name="course_id" placeholder="Short Title" />
                            <br>
                        @endif
                        <label>@lang('lang.title_label')</label>
                        <br>
                        <input type="text" placeholder="Enter title" name="title" placeholder="Short Title" />
                        <br>
                        <label>@lang('lang.body_label')</label>
                        <br>
                        <textarea name="body" placeholder="Brief Description" cols="100" rows="5"> </textarea>
                        <input type="submit" value="@lang('lang.submit_bttn')" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection