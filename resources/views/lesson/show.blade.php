<!--Author: Adrian Alberto Gutierrez Leal-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!--Back to Home Button-->
                <form action="{{ route('home.index') }}">
                    <button type="submit" class="btn btn-primary" style="background-color:grey">@lang('lang.back_bttn')</button>
                </form>
                <div class="card-header">@lang('lang.lesson_show_header')</div>
                <!--Sort Button-->
                <form action="{{route('lesson.show')}}" method="GET">
                    <div class="toolbar-sorter">
                        <span>@lang('lang.sort')</span>
                        <select name="sorter" class="sorter-options" style="width:150px; " data-role="sorter">
                            <option value='id_asc'> @lang('lang.id_asc')</option>
                            <option value='id_desc'>@lang('lang.id_desc')</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:green">@lang('lang.sort_bttn')</button>
                </form>
                <div class="card-body">
                    <!--Show Everything in DB-->
                    @foreach($data["lessons"] as $lesson)
                    <div class="col-md-6 col-lg-4 mb-5">
                        @if($loop->index < 2) <p><b>{{$lesson->getId()}}. {{$lesson->getTitle()}}</b></p>
                            @else
                            <p>{{$lesson->getId()}}. {{$lesson->getTitle()}}</p>
                            @endif
                            <!--Button to deploy Modal with Lesson content-->
                            <div class="portfolio-item mx-auto" data-toggle="modal"
                                data-target="#myModal-{{$lesson->getId()}}">
                                <button class="btn btn-primary">
                                    @lang('lang.see_lesson_bttn')
                                </button>
                            </div>
                    </div>
                    <!--Modal-->
                    <div class="portfolio-modal modal fade" id="myModal-{{$lesson->getId()}}" tabindex="-1"
                        role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                </button>
                                <div class="modal-body text-center">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <!-- Modal Lesson - Title-->
                                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"
                                                    id="portfolioModal1Label">
                                                    {{$lesson->getTitle()}}
                                                </h2>
                                                <!-- Model Lesson - Image-->
                                                <img class="img-fluid rounded mb-5"
                                                    src="{{ asset('/img/idea/idea_logo.png') }}" alt="" />
                                                <!-- Modal Lesson- Body-->
                                                <p>
                                                    {{ $lesson->getBody()}}
                                                </p>
                                                <div class="d-flex justify-content-around">
                                                    <!--Back to show page-->
                                                    <button class="btn btn-primary" data-dismiss="modal">
                                                        <i class="fas fa-times fa-fw"></i>
                                                            @lang('lang.back_bttn')
                                                    </button>
                                                    <!--See Full info-->
                                                    <form action="{{ route('lesson.showFullLesson',['id'=>$lesson->getId()]) }}"
                                                        method="GET">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">
                                                            @lang('lang.more_bttn')
                                                        </button>
                                                    </form>
                                                    <!--Delete Lesson from Database-->
                                                    <form action="{{ route('lesson.remove',['id'=>$lesson->getId()]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger float-right">
                                                            @lang('lang.delete_bttn')
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of Modal-->
                    <br />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection