<!--Author: Simon Florez Silva (sflorezs1@eafit.edu.co)-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-content-center">
                    @lang("messages.course.list.admin.cardTitle")
                    <form action="{{ route('admin.courses.create') }}" method="get">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>@lang('messages.course.id')</th>
                                <th>@lang('messages.course.title')</th>
                                <th>@lang('messages.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data["courses"] as $course)
                            <tr>
                                <th scope="row">{{ $course->getId() }}</th>
                                <td>{{ $course->getTitle() }}</td>
                                <td>
                                    <div class="d-flex flex-row">
                                        <form action="{{ route('courses.show', $course->getId()) }}" method="get">
                                            <button type="submit" class="btn btn-outline-info mx-1 h-100">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.courses.edit', $course->getId()) }}" method="get">
                                            <button type="submit" class="btn btn-outline-warning mx-1 h-100">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-outline-danger mx-1" data-toggle="modal"
                                            data-target="#delete-{{ $course->getId() }}">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </div>

                                    <!-- Modal for delete -->
                                    <div class="modal fade" id="delete-{{ $course->getId() }}" tabindex="-1"
                                        role="dialog" aria-labelledby="modal-delete-label-{{ $course->getId() }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="modal-delete-label-{{ $course->getId() }}">
                                                        @lang("messages.delete") {{ $course->getId() }} -
                                                        {{ $course->getTitle() }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="@lang(" messages.close")">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @lang('messages.course.delete.asksure')
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">@lang("messages.close")</button>
                                                    <form action="{{ route('admin.courses.delete', $course->getId()) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger h-100">@lang("messages.delete")</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection