@extends('layouts.master')

@section('content')
<div class="container">
    <h1>{{ Auth::user()->getName() }}</h1>
</div>

@endsection
