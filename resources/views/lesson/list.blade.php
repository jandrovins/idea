<!--Author: Adrian Alberto Gutierrez Leal-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang("messages.lesson.list.cardTitle")</div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($data["lessons"] as $lesson)
                        <div data-toggle="modal" data-target="#myModal-{{$lesson->getId()}}">
                            <button class="btn btn-light">
                                {{($loop->index)+1}}. {{$lesson->getTitle()}}
                            </button>
                        </div>
                    </div>
                </div>
                <!--Modal-->
                <div class="portfolio-modal modal fade" id="myModal-{{$lesson->getId()}}" tabindex="-1" role="dialog"
                    aria-labelledby="portfolioModal1Label" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" 
                            aria-label="@lang("messages.close")">
                                <span aria-hidden="true">&times;</span>
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
                                            <!-- Modal Lesson- Body-->
                                            <p>
                                                {{ $lesson->getBody()}}
                                            </p>
                                        </div>
                                    </div>
                                    <!--See Full info-->
                                    <form action="{{ route('lesson.show',$lesson->getId()) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary float-right">
                                            <i class="fa fa-plus"> @lang('messages.lesson.show') </i>
                                        </button>
                                    </form>
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