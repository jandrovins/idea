<!--Author: Adrian Alberto Gutierrez Leal-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('lang.lesson_show_header'): {{$data['course']->getTitle()}}</div>
                <div class="card-body">
                    <!--Show Everything in DB-->
                    @foreach($data["lessons"] as $lesson)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal">
                            <label>{{($loop->index)+1}}. {{$lesson->getTitle()}}</label>
                            <form action="{{ route('admin.lesson.remove',['id'=>$lesson->getId()]) }}" method="POST">
                                @csrf
                                @include('util.message')
                                <!--Delete Lesson from Database-->
                                <button type="submit" class="btn btn-danger float-right">
                                    @lang('lang.delete_bttn')
                                </button>  
                            </form>
                            <form action="{{ route('admin.lesson.edit',['id'=>$lesson->getId()]) }}" method="GET"> <!--CHANGE-->
                                @csrf
                                <!--Edit Lesson in Database-->
                                <button type="submit" class="btn btn-primary">
                                    @lang('lang.edit_bttn')
                                </button> 
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection