<!--Author: Simon Florez Silva (sflorezs1@eafit.edu.co)-->
@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.auth.verify_email')</div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('messages.auth.verification_link_sent')
                        </div>
                    @endif
                    @lang('messages.auth.check_verification_link')
                    @lang('messages.auth.if_email_not_received'),
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">@lang('messages.auth.click_to_request_another')</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
