<div class="card-header">@lang("messages.course.listTop.cardTitle")</div>
@if (count($data["courses"]) === 0)
@lang("messages.course.listTop.noCoursesWithReviews")
@elseif (count($data["courses"]) === 1)
@lang("messages.course.listTop.onlyOneCourseWithReviews")
@elseif (count($data["courses"]) < 3) @lang("messages.course.listTop.notEnoughCoursesWithReviews", ['count_courses'=>
    count($data["courses"])])
    @endif
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner p-2">
            @foreach($data['courses'] as $course)
            <div class="carousel-item {{ $loop->first ? " active" : "" }}">
                <div class="d-block fw">
                    <div class="card">
                        <img class="card img-fluid bg-image"
                            src="{{ $course->getImage() }}">
                        <div class="card-img-overlay">
                            <div class="card-header text-center">
                                <span class="font-weight-bold">{{ $course['title'] }}</span>
                            </div>
                            <div class="card special-card">
                                <p class="card-body font-weight-bold ">
                                    {{ $course->getSummary() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        </a>
    </div>
