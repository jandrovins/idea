<!--Author: Adrian Alberto Gutierrez Leal-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["lesson"]->getTitle() }}</div>
                <div class="card-body">
                    <p class="card=text"> {{ $data["lesson"]->getBody() }} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection