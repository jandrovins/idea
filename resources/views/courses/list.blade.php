<!--Author: Simon Florez Silva (sflorezs1@eafit.edu.co)-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">@lang("messages.course.list.cardTitle")</div>
                <div class="card-body">
                    <div class="list-group">
                        @if (count($data["courses"]) === 0)
                            @lang("messages.course.list.noCoursesToList")
                        @endif
                        @foreach ($data["courses"] as $course)
                        <a href="{{ route('courses.show', $course->getId()) }}"
                            class="list-group-item list-group-item-action">
                            {{ $course->getId() }} - {{ $course->getTitle() }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
