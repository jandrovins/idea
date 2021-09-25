<!--Authors: Vincent Arcila (vaarcilal@eafit.edu.co)-->
@if ( $data['isEnrolled'] )
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
                <input type="number" class="form-control" name="rating" min="0" max="10" placeholder=10
                    value="{{ old('rating') }}">
            </div>
            <div class="form-group">
                <label for="comment">@lang("messages.course.review.comment")</label>
                <textarea class="form-control" name="comment" rows="5"
                    placeholder="@lang("messages.course.createReview.commentPlaceholder")"
                    value="{{ old('comment') }}"></textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="course_id" value="{{  $data['course']->getId() }}">
            <button type="submit" class="btn btn-primary float-right">
                @lang("messages.course.create.submit")
            </button>
        </form>
    </div>
</div>
@endif
