@extends('layouts.master')

@section('content')

<h1>{{ Auth::user()->getName() }}</h1>

@endsection
