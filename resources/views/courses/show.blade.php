<!--Authors: Simon Florez Silva (sflorezs1@eafit.edu.co), Adrián Gutiérrez (aagutierrl@eafit.edu.co), Vincent Arcila (vaarcilal@eafit.edu.co)-->
<!--Last edition: September 22 -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-content-center">
                    {{ $data["course"]->getId() }} - {{ $data["course"]->getTitle() }}
                    
                    <form action="{{ route('inscription.enroll') }}" method="post">
                        @csrf
                        <input type="hidden" id="courseId" name="courseId" value="{{ $data['course']->getId() }}">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-check"></i> @lang('messages.course.list.enroll.submit')
                    </form>
                </div>
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
                    <div class="list-group">
                        @foreach ($data["course"]->lessons as $lesson)
                        <a href="{{ route('lesson.show', $lesson->getId()) }}"
                            class="list-group-item list-group-item-action">
                            {{ $lesson->getTitle() }}
                        </a>
                        @endforeach
                    </div>
                    @else
                    <h6><span class="font-weight-bold">@lang("messages.course.noLessons")</span></h6>
                    @endif

                </div>
            </div>
            <div class="card">
                <div class="card-header">@lang("messages.course.reviews")</div>
                <div class="card-body">
                    @if (!$data["course"]->reviews->isEmpty())
                    <ul class="list-group">
                        @foreach ($data["course"]->reviews as $review)
                            <li class="list-group-item">
                                <h6><span class="font-weight-bold">@lang("messages.course.review.user"):</span>
                                    {{ $review->user->getName() }}</h6>
                                <h6><span class="font-weight-bold">@lang("messages.course.review.rating"):</span>
                                    {{ $review->getRating() }}</h6>
                                <h6><span class="font-weight-bold">@lang("messages.course.review.comment"):</span>
                                    {{ $review->getComment() }}</h6>
                            </li>
                        @endforeach
                    </ul>
                    @else
                    <h6><span class="font-weight-bold">@lang("messages.course.hasNoReviews")</span></h6>
                    @endif
                </div>
            </div>
        </div>
            <div class="card">
                <div class="card-header">@lang("messages.course.createReview.cardTitle")</div>
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-warning" role="alert">
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('review.save') }}">
                        @csrf
                        <div class="form-group">
                            <label for="rating">@lang("messages.course.review.rating")</label>
                            <input type="number" class="form-control" name="rating" min="0" max="10"
                            placeholder=10 value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="comment">@lang("messages.course.review.comment")</label>
                            <textarea class="form-control" name="comment" rows="5"
                            placeholder="@lang("messages.course.createReview.commentPlaceholder")" value="{{ old('comment') }}">
                            </textarea>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="course_id" value="{{  $data['course']->getId() }}">
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
