<!--Author: Vincent A. Arcila-->

@extends ('layouts.master')

@section ("title", __('messages.error.404.title'))

@section ('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    @lang('messages.error.404.title')
                </div>
                <div class="card-body">
                    <p class="card-text"> {{ $exception->getMessage() }} </p>
                    <img class="justify-content-center" src="{{URL('/img/idea-logo.jpeg')}}">
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
