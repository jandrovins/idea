<!--Author: Adrian Alberto Gutierrez Leal-->
@extends ('layouts.master')
@section ("title", $data["title"])
@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $data["title"] }}
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('courses.list') }}"
                            class="list-group-item list-group-item-action">
                            @lang('messages.home.store')
                        </a>
                        <a href="{{route('courses.listOwn')}}"
                            class="list-group-item list-group-item-action">
                            @lang('messages.home.owned')
                        </a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
