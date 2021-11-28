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
        <div class="card col-md-2">
            <img style="height: 25%;" class="img-fluid img-thumbnail card-img-top" src="{{asset('storage/upload/course-images/'.$usercourse->course->image)}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$usercourse->course->title}}</h5>
                <div style="  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: hidden;
  max-height: 10em;
  line-height: 1.8em;" class="card-text">{!! $usercourse->course->description !!}</div>
                <a href="{{ route('courses.list.detail',['id'=>$usercourse->course->id]) }}" class="btn btn-primary">See in detail</a>
            </div>
        </div>
        @empty
        <h2>No courses found.</h2>
        @endforelse
    </div>
</div>



@stop

@section('scripts')

@stop