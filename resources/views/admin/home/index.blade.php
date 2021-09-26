<!--Author: Vincent Arcila (vaarcilal@eafit.edu.co)-->
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
                        <a href="{{ route('admin.courses.list') }}"
                            class="list-group-item list-group-item-action">
                            @lang('messages.course.manage')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
