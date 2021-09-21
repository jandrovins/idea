<!--Author: Simon Florez Silva (sflorezs1@eafit.edu.co)-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["course"]->getId() }} - {{ $data["course"]->getTitle() }}</div>
                <div class="card-body">
                    <h5><span class="font-weight-bold">@lang("messages.course.id"):</span>
                        {{ $data["course"]->getId() }}</h5>
                    <h6><span class="font-weight-bold">@lang("messages.course.title"):</span>
                        {{ $data["course"]->getTitle() }}
                    </h6>
                    <h6><span class="font-weight-bold">@lang("messages.course.summary"):</span></h6>
                    <p class="card-text">{{ $data["course"]->getSummary() }}</p>
                    <h6><span class="font-weight-bold">@lang("messages.course.learningStyle"):</span>
                        {{ $data["course"]->getLearningStyle() }}</h6>
                    <h6><span class="font-weight-bold">@lang("messages.course.categories"):</span>
                        {{ $data["course"]->getCategories() }}</h6>
                    <h6><span class="font-weight-bold">@lang("messages.course.price"):</span>
                        {{ $data["course"]->getPrice() }}
                    </h6>
                    @if (!$data["course"]->lessons->isEmpty())
                    <h6><span class="font-weight-bold">@lang("messages.course.lessons"):</span></h6>
                    <ul class="list-group">
                        @foreach ($data["course"]->lessons as $lesson)
                        <li class="list-group-item">{{ $lesson->getTitle() }}</li>
                        @endforeach
                    </ul>
                    @else
                    <h6><span class="font-weight-bold">@lang("messages.course.noLessons")</span></h6>
                    @endif
                    <!-- TODO(): Add code for comments or ratings -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection