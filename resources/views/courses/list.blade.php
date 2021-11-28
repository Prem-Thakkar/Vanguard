@extends('layouts.app')

@section('page-title', __('courses.page_name'))
@section('page-heading', __('courses.page_name'))

@section('breadcrumbs')
<li class="breadcrumb-item active">
    @lang('courses.page_name')
</li>
@stop

@section('content')

@include('partials.messages')

<div class="row">

</div>
<div class="card">
    <div class="card-body row">
        @forelse($usercourses as $usercourse)
            <div class="col-md-6">
                <a href="{{ route('courses.list.detail',['id'=>$usercourse->course->id]) }}" class="text-dark">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img  style="height:60px;" class="img-fluid img-thumbnail col-md-6" src="{{asset('storage/upload/course-images/'.$usercourse->course->image)}}" alt="Card image cap">
                                        </div>
                                        <div class="col-md-6">
                                            <h5>{{$usercourse->course->title}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        <!-- <div class="card col-md-2">
            <img style="height: 25%;" class="img-fluid img-thumbnail card-img-top" src="{{asset('storage/upload/course-images/'.$usercourse->course->image)}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$usercourse->course->title}}</h5>
                <a href="{{ route('courses.list.detail',['id'=>$usercourse->course->id]) }}" class="btn btn-primary">See in detail</a>
            </div>
        </div> -->
        @empty
        <h2>No courses found.</h2>
        @endforelse
    </div>
</div>



@stop

@section('scripts')

@stop