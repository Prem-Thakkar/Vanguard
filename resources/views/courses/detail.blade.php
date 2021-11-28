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
        <img class="col-md-2" src="{{asset('storage/upload/course-images/'.$course->image)}}" class="img-fluid" alt="Responsive image">
        <div class="col-md-4">
            <iframe height="100%" width="100%" 
            src="{{ $course->video_url }}" 
            title="{{$course->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-md-12">
            <h4>{{__('courses.course_name')}}: {{ $course->title }}</h4>
            <p>{{ $course->title }} {{__('courses.course_description')}}:<br /> {!! $course->description !!}</p>
            <p>{{ $course->title }} {{__('courses.what_you_will_learn')}}:<br /> {!! $course->description !!}</p>
        </div>
    </div>
</div>



@stop

@section('scripts')

@stop