@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">@lang("messages.course.create.card-title")</div>
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
                    <form method="POST" action="{{ route('courses.save') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">@lang("messages.course.create.course-title")</label>
                            <input type="text" class="form-control" name="title"
                                placeholder="@lang("messages.course.create.course-title-placeholder")"
                                value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="learningStyles">@lang("messages.course.create.learning-styles")</label>
                            <input type="text" class="form-control" name="learningStyles"
                                placeholder="@lang("messages.course.create.learning-styles-placeholder")"
                                value="{{ old('learningStyles') }}">
                        </div>
                        <div class="form-group">
                            <label for="categories">@lang("messages.course.create.categories")</label>
                            <input type="text" class="form-control" name="categories"
                                placeholder="@lang("messages.course.create.categories-placeholder")"
                                value="{{ old('categories') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">@lang("messages.course.create.price")</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control" name="price" placeholder="10"
                                    value="{{ old('price') }}" aria-describedby="price-addon">
                                <div class="input-group-append">
                                    <span class="input-group-text"
                                        id="price-addon">@lang("messages.course.create.price-unit")</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="summary">@lang("messages.course.create.summary")</label>
                            <textarea name="summary" id="summary" cols="30" rows="3" class="form-control"
                                placeholder="@lang("messages.course.create.summary-placeholder")"
                                value="{{ old('summary') }}"></textarea>
                        </div>
                        <button type="submit"
                            class="btn btn-primary float-right">@lang("messages.course.create.submit")</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection