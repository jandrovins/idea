<!--Author: Vincent Arcila (vaarcilal@eafit.edu.co)-->
@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang("messages.course.listTop.cardTitle")</div>
                <div class="card-body">
                    @if (count($data["courses"]) === 0)
                        @lang("messages.course.listTop.noCoursesWithReviews")
                    @elseif (count($data["courses"]) === 1)
                        @lang("messages.course.listTop.onlyOneCourseWithReviews")
                    @elseif (count($data["courses"]) < 3)
                        @lang("messages.course.listTop.notEnoughCoursesWithReviews", ['count_courses' => count($data["courses"])])
                    @endif
                    <div class="list-group">
                        @foreach ($data["courses"] as $course)
                        <a href="{{ route('courses.show', $course->getId()) }}"
                            class="list-group-item list-group-item-action">
                            {{ $course->getId() }} - {{ $course->getTitle() }} - @lang("messages.course.review.rating"): {{ $course->reviews_avg_rating }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
