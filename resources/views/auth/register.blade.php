<!--Author: Simon Florez Silva (sflorezs1@eafit.edu.co)-->
@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.auth.register')</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">@lang('messages.auth.name')</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="learningStyle" class="col-md-4 col-form-label text-md-right">@lang("messages.course.learningStyle")</label>
                            <div class="col-md-6">
                                <select class="custom-select form-control" name="learningStyle" value="{{ old('learningStyle') }}">
                                    <option value="auditory">@lang("messages.course.auditory")</option>
                                    <option value="kinesthesic">@lang("messages.course.kinesthesic")</option>
                                    <option value="visual">@lang("messages.course.visual")</option>
                                </select>
                            </div>
                            @error('learningStyle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row"> 
                            <label for="datepicker" class="col-md-4 col-form-label text-md-right">@lang("messages.user.dob")</label>
                            <div class="input-group col-md-6"> 
                                <input id="datepicker" type="date" 
                                    class="date form-control @error('dateOfBirth') is-invalid @enderror" name="dateOfBirth" 
                                    value="{{ old('dateOfBirth') }}" required autofocus> 
                                @error('dateOfBirth') 
                                    <span class="invalid-feedback" role="alert"> 
                                        <strong>{{ $message }}</strong> 
                                    </span> 
                                @enderror 
                            </div> 
                        </div> 
                        <div class="form-group row"> 
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">@lang("messages.user.phoneNum")</label>
                            <div class="input-group col-md-6"> 
                                <input id="phoneNumber" type="text" 
                                    class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" 
                                    value="{{ old('phoneNumber') }}" required autocomplete="phoneNumber" autofocus> 
                                @error('phoneNumber') 
                                    <span class="invalid-feedback" role="alert"> 
                                        <strong>{{ $message }}</strong> 
                                    </span> 
                                @enderror 
                            </div> 
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">@lang('messages.auth.email_address')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">@lang('messages.auth.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('messages.auth.confirm_password')</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('messages.auth.register')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
