<!--Authors: Simon Florez Silva (sflorezs1@eafit.edu.co), Adrián Gutiérrez (aagutierrl@eafit.edu.co), Vincent Arcila (vaarcilal@eafit.edu.co)-->
@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include ('util.message')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-content-center">
                    <span class="ellipsis w-75">{{ $data["course"]->getId() }} - {{ $data["course"]->getTitle() }}</span>
                    @if ( $data['isEnrolled'] )
                    <!-- Button for leave -->
                    <button type="button" class="btn btn-sm btn-danger" data-target="#leave" data-toggle="modal">
                        <i class="fa fa-times"></i> @lang('messages.course.enroll.leave')
                    </button>
                    <!-- Modal for leave -->
                    <div class="modal fade" id="leave" tabindex="-1" role="dialog"
                        aria-labelledby="modal-leave-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-leave-label">
                                        @lang("messages.course.enroll.leave") {{ $data['course']->getId() }} -
                                        {{ $data['course']->getTitle() }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="@lang("
                                        messages.close")">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @lang('messages.course.enroll.leave.asksure')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">@lang("messages.close")</button>
                                    <form action="{{ route('inscription.leave') }}" method="post">
                                        @csrf
                                        <input type="hidden" id="courseId" name="courseId" value="{{ $data['course']->getId() }}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-times"></i> @lang('messages.course.enroll.leave')
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <form action="{{ route('inscription.enroll') }}" method="post">
                        @csrf
                        <input type="hidden" id="courseId" name="courseId" value="{{ $data['course']->getId() }}">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-check"></i> @lang('messages.course.enroll.submit')
                        </button>
                    </form>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row flex-nowrap">
                        <div class="column px-2 pb-2 w-30">
                            <img class="rounded img-thumbnail sm"
                                 src="{{ asset($data['course']->getImage()) }}" alt="@lang("messages.course.image")">
                        </div>
                        <div class="column w-70">
                            <h5 class="text-wrap wrap-break"><span class="font-weight-bold">@lang("messages.course.id"):</span>
                                {{ $data["course"]->getId() }}</h5>
                            <h6 class="text-wrap wrap-break"><span class="font-weight-bold">@lang("messages.course.title"):</span>
                                {{ $data["course"]->getTitle() }}
                            </h6>
                            <h6 class="text-wrap wrap-break"><span class="font-weight-bold">@lang("messages.course.author"):</span>
                                {{ $data["course"]->author->getName() }}
                            </h6>
                            <h6 class="text-wrap wrap-break"><span class="font-weight-bold">@lang("messages.course.learningStyle"):</span>
                                {{ $data["course"]->getLearningStyle() }}</h6>
                            <h6 class="text-wrap wrap-break"><span class="font-weight-bold">@lang("messages.course.categories"):</span>
                                {{ $data["course"]->getCategories() }}</h6>
                            <h6 class="text-wrap wrap-break"><span class="font-weight-bold">@lang("messages.course.price"):</span>
                                {{ $data["course"]->getPrice() }}
                            </h6>
                        </div>
                    </div>

                    <h6><span class="font-weight-bold">@lang("messages.course.summary"):</span></h6>
                    <p class="card-text">{{ $data["course"]->getSummary() }}</p>

                    @if (!$data["course"]->lessons->isEmpty())
                    @include('lesson.list')
                    @else
                    <h6><span class="font-weight-bold">@lang("messages.course.noLessons")</span></h6>
                    @endif
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">@lang("messages.course.reviews")</div>
                <div class="card-body">
                    @if (!$data["course"]->reviews->isEmpty())
                    <ul class="list-group">
                        @foreach ($data["course"]->reviews as $review)
                        <li class="list-group-item">
                            <div class="row flex-nowrap">
                                <div class="column px-2 w-20">
                                    <img class="rounded img-thumbnail xsm"
                                         src="{{ asset($review->user->getImage()) }}" alt="@lang("messages.course.image")">
                                </div>
                                <div class="column w-80">
                                    <h6 class="text-wrap wrap-break"><span class="font-weight-bold">@lang("messages.course.review.user"):</span>
                                        {{ $review->user->getName() }}</h6>
                                    <h6 class="text-wrap wrap-break"><span class="font-weight-bold">@lang("messages.course.review.rating"):</span>
                                        @for($i = 0; $i < $review->getRating() / 2; $i++)
                                            @if($i + 0.5 == $review->getRating() / 2)
                                                <i class="fa fa-star-half-o"></i>
                                            @else
                                                <i class="fa fa-star"></i>
                                            @endif
                                        @endfor
                                        @for($i = ceil($review->getRating() / 2); $i < 5; $i++)
                                            <i class="fa fa-star-o"></i>
                                        @endfor
                                        {{ $review->getRating() }}
                                    </h6><br>
                                    <h6 class="text-wrap wrap-break w-100"><span class="font-weight-bold">@lang("messages.course.review.comment"):</span>
                                        {{ $review->getComment() }}</h6>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <h6><span class="font-weight-bold">@lang("messages.course.hasNoReviews")</span></h6>
                    @endif
                </div>
            </div>
        </div>
        <div class="column">
        @if ( $data['isEnrolled'] )
            @include ('courses.createReview')
        @endif
        </div>
    </div>
</div>
@endsection
