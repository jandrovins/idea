<!--Author: Simon Florez Silva (sflorezs1@eafit.edu.co)-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">@lang("messages.course.create.cardTitle")</div>
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
                    <form method="POST" action="{{ route('admin.courses.save') }}">
                        @csrf
                        <input type="hidden" name="author_id" value="{{ Auth::user()->getId() }}">
                        <div class="form-group">
                            <label for="title">@lang("messages.course.title")</label>
                            <input type="text" class="form-control" name="title" 
                            placeholder="@lang("messages.course.titlePlaceholder")" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="learningStyle">@lang("messages.course.learningStyle")</label>
                            <select class="custom-select" name="learningStyle" value="{{ old('learningStyle') }}">
                                <option value="auditory">@lang("messages.course.auditory")</option>
                                <option value="kinesthesic">@lang("messages.course.kinesthesic")</option>
                                <option value="visual">@lang("messages.course.visual")</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categories">@lang("messages.course.create.categories")</label>
                            <input type="text" class="form-control" name="categories" 
                            placeholder="@lang("messages.course.create.categoriesPlaceholder")" value="{{ old('categories') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">@lang("messages.course.price")</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control" name="price" placeholder="10"
                                    value="{{ old('price') }}" aria-describedby="price-addon">
                                <div class="input-group-append">
                                    <span class="input-group-text"
                                        id="price-addon">@lang("messages.course.priceUnit")</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="summary">@lang("messages.course.summary")</label>
                            <textarea name="summary" id="summary" cols="30" rows="3" class="form-control"
                                placeholder="@lang("messages.course.summaryPlaceholder")"
                                value="{{ old('summary') }}"></textarea>
                        </div>
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