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
                            <input type="text" class="form-control" name="title" placeholder="@lang("
                                messages.course.titlePlaceholder")" value="{{ $data["course"]->getTitle() }}">
                        </div>
                        <div class="form-group">
                            <label for="learningStyle">@lang("messages.course.learningStyle")</label>
                            <select class="custom-select" name="learningStyle"
                                value="{{ $data["course"]->getLearningStyle() }}">
                                <option value="auditory">@lang("messages.course.auditory")</option>
                                <option value="kinesthesic">@lang("messages.course.kinesthesic")</option>
                                <option value="visual">@lang("messages.course.visual")</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categories">@lang("messages.course.create.categories")</label>
                            <input type="text" class="form-control" name="categories" placeholder="@lang("
                                messages.course.create.categoriesPlaceholder")"
                                value="{{ $data["course"]->getCategories() }}">
                        </div>
                        <div class="form-group">
                            <label for="price">@lang("messages.course.price")</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control" name="price" placeholder="10"
                                    value="{{ $data["course"]->getPrice() }}" aria-describedby="price-addon">
                                <div class="input-group-append">
                                    <span class="input-group-text"
                                        id="price-addon">@lang("messages.course.priceUnit")</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="summary">@lang("messages.course.summary")</label>
                            <textarea name="summary" id="summary" cols="30" rows="3" class="form-control"
                                placeholder="@lang("
                                messages.course.summaryPlaceholder")">{{ $data["course"]->getSummary() }}</textarea>
                        </div>
                        <button type="submit"
                            class="btn btn-primary float-right">@lang("messages.course.edit.submit")</button>
                    </form>
                    <br>
                    <!--Display Lesson List-->
                    <details class="details-example">
                        <summary>
                            @lang("messages.course.lessons")
                        </summary>
                        <ul>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.lesson.id')</th>
                                        <th>@lang('messages.lesson.title')</th>
                                        <th>@lang('messages.actions')</th>
                                    </tr>
                                    <div class="card-header d-flex justify-content-between align-content-center">
                                        @lang("messages.course.list.admin.lesson")
                                        <form id='add_lesson' action="{{ route('admin.lesson.create',$data['course']->getId()) }}"
                                            method="get">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fa fa-plus"></i>
                                        </form>
                                    </div>
                                </thead>
                                <tbody>
                                    @foreach ($data['course']->lessons as $lesson)
                                    <tr>
                                        <th scope="row">{{ $lesson->getId() }}</th>
                                        <td>{{ $lesson->getTitle() }}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <form 
                                                    action="{{ route('lesson.show', $lesson->getId()) }}"
                                                    method="get">
                                                    <button type="submit" class="btn btn-outline-info mx-1 h-100">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </form>
                                                <form 
                                                action="{{ route('admin.lesson.edit', $lesson->getId()) }}"
                                                    method="get">
                                                    <button type="submit"
                                                        class="btn btn-outline-warning mx-1 h-100">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                                <form 
                                                    action="{{ route('admin.lesson.remove',['id'=>$lesson->getId()]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger mx-1">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                            </table>
                        </ul>
                    </details>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection