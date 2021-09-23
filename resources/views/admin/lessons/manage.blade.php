<!--Author: Adrian Alberto Gutierrez Leal-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>@lang('messages.lesson.id')</th>
                                <th>@lang('messages.lesson.title')</th>
                                <th>@lang('messages.actions')</th>
                            </tr>
                            <div class="card-header d-flex justify-content-between align-content-center">
                                @lang("messages.course.list.admin.lesson")
                                <form id='add_lesson' action="{{ route('admin.lesson.create',$data['cId']) }}"
                                    method="get">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fa fa-plus"></i>
                                </form>
                            </div>
                        </thead>
                        <tbody>
                            @foreach ($data['lessons'] as $lesson)
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
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection