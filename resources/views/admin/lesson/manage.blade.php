<!--Author: Adrian Alberto Gutierrez Leal-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('lang.lesson_show_header')</div>
                <!--Sort Button-->
                <form action="{{route('admin.lesson.manage')}}" method="GET">
                    <div class="toolbar-sorter">
                        <span>@lang('lang.sort')</span>
                        <select name="sorter" class="sorter-options" style="width:150px; " data-role="sorter">
                            <option value='id_asc'> @lang('lang.id_asc')</option>
                            <option value='id_desc'>@lang('lang.id_desc')</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        @lang('lang.sort_bttn')
                    </button>
                </form>
                <div class="card-body">
                    <!--Show Everything in DB-->
                    @foreach($data["lessons"] as $lesson)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal">
                            <!--Delete Lesson from Database-->
                            <label>{{($loop->index)+1}}. {{$lesson->getTitle()}}</label>
                            <form action="{{ route('admin.lesson.remove',['id'=>$lesson->getId()]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger float-right">
                                    @lang('lang.delete_bttn')
                                </button>  
                            </form>
                            <form action="{{ route('admin.lesson.edit',['id'=>$lesson->getId()]) }}" method="POST"> <!--CHANGE-->
                                @csrf
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