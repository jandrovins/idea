<!--Author: Adrian Alberto Gutierrez Leal-->
<h6><span class="font-weight-bold">@lang("messages.course.lessons"):</span></h6>
<div class="list-group">
    @foreach ($data["course"]->lessons as $lesson)
        <a href="{{ route('lesson.show', $lesson->getId()) }}" class="list-group-item list-group-item-action">
            {{ $lesson->getTitle() }}
        </a>
    @endforeach
</div>
