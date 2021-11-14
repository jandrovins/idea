<!--Author: Simon Florez Silva (sflorezs1@eafit.edu.co)-->
@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">@lang("messages.course.edit.cardTitle"): {{ $data["course"]->getId() }} -
                    {{ $data["course"]->getTitle() }}</div>
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
                    <form method="POST" id="update_course"
                        action="{{ route('admin.courses.update', $data["course"]->getId()) }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">@lang("messages.course.title")</label>
                            <input type="text" class="form-control" name="title" placeholder="@lang('messages.course.titlePlaceholder')"
                                value="{{ old('title', $data["course"]->getTitle()) }}">
                        </div>
                        <div class="form-group">
                            <label for="learningStyle">@lang("messages.course.learningStyle")</label>
                            <select class="custom-select" name="learningStyle"
                                value="{{ old('learningStyle', $data["course"]->getLearningStyle()) }}">
                                <option value="auditory">@lang("messages.course.auditory")</option>
                                <option value="kinesthesic">@lang("messages.course.kinesthesic")</option>
                                <option value="visual">@lang("messages.course.visual")</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categories">@lang("messages.course.create.categories")</label>
                            <input type="text" class="form-control" name="categories" placeholder="@lang(
                                "messages.course.create.categoriesPlaceholder")"
                                value="{{ old('categories', $data["course"]->getCategories()) }}">
                        </div>
                        <div class="form-group">
                            <label for="price">@lang("messages.course.price")</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control" name="price" placeholder="10"
                                    value="{{ old('price', $data["course"]->getPrice()) }}" aria-describedby="price-addon">
                                <div class="input-group-append">
                                    <span class="input-group-text"
                                        id="price-addon">@lang("messages.course.priceUnit")</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="summary">@lang("messages.course.summary")</label>
                            <textarea name="summary" id="summary" cols="30" rows="3" class="form-control"
                                placeholder="@lang(
                                "messages.course.summaryPlaceholder")">{{ old('summary', $data["course"]->getSummary()) }}</textarea>
                        </div>
                        <button type="submit"
                            class="btn btn-primary float-right">@lang("messages.course.edit.submit")</button>
                    </form>
                    <br>
                    @include('admin.lessons.manage')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
