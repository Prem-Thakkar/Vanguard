@extends('layouts.app')
@php
if(!empty($course)){
$page_title =__('courses.edit_page.title');
}else{
$page_title =__('courses.create_page.title');
}
@endphp

@section('page-title', $page_title)
@section('page-heading', $page_title)

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{ route('users.index') }}">@lang('courses.page_name')</a>
</li>
<li class="breadcrumb-item active">
    @if(!empty($course))
    @lang('courses.edit_page.page_name')
    @else
    @lang('courses.create_page.page_name')
    @endif
</li>
@stop

@section('content')

@include('partials.messages')
@if(!empty($course))
{!! Form::open(['route' => ['manage_courses.update',$course->id], 'files' => true, 'id' => 'courseform']) !!}
{{ method_field('PUT') }}
@else
{!! Form::open(['route' => 'manage_courses.store', 'files' => true, 'id' => 'courseform']) !!}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="first_name">@lang('courses.create_page.form_input_title')</label>
                    <input @if(!empty($course)) value="{{$course->title}}" @endif type="text" class="form-control input-solid" id="title" name="title" placeholder="@lang('courses.create_page.form_input_title_placeholder')">
                </div>

                <div class="form-group">
                    <label for="description">@lang('courses.create_page.form_input_description')</label>
                    <textarea id="description" required name="description">
                    @if(!empty($course)) {!! $course->description !!} @endif
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="what_learner_learn">@lang('courses.create_page.form_input_image')</label>
                    <input name="image_upload" type="file" id="image_upload" class="form-control input-solid">
                    <img id="preview_image" @if(!empty($course)) src="{{asset("storage/upload/course-images/$course->image")}}" @else style="display: none;" @endif class="col-md-2 mt-2" src="https://images.unsplash.com/photo-1549740425-5e9ed4d8cd34?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="" class="img-thumbnail">
                </div>

                <div class="form-group">
                    <label for="what_learner_learn">@lang('courses.create_page.form_input_what_learner_learn')</label>
                    <textarea id="what_learner_learn" name="what_learner_learn">
                    @if(!empty($course)) {!! $course->what_learner_learn !!} @endif
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="what_learner_learn">@lang('courses.create_page.form_input_video_url')</label>
                    <input @if(!empty($course)) value="{{$course->video_url}}" @endif type="text" name="video_url" id="video_url" class="form-control input-solid" placeholder="@lang('courses.create_page.form_input_video_url_placeholder')">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <button id="submitcourse" type="button" class="btn btn-primary">
            @if(!empty($course))
            @lang('courses.edit_page.title')
            @else
            @lang('courses.create_page.title')
            @endif
        </button>
    </div>
</div>
{!! Form::close() !!}

<br>
@stop

@section('scripts')
{!! JsValidator::formRequest('Vanguard\Http\Requests\Course\CreateCourseRequest', '#courseform') !!}
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('what_learner_learn');

    $("#image_upload").on("change", (e) => {
        if (e.target.files[0]) {
            $("#preview_image").prop(`src`, URL.createObjectURL(e.target.files[0]));
            $("#preview_image").show();
        } else {
            $("#preview_image").hide();
        }
    });

    function removeRules(rulesObj) {

        for (var item in rulesObj) {
            $('#' + item).rules('remove');
        }
    }

    $(document).ready(() => {
        $("#submitcourse").on("click", () => {
            @if(!empty($edit_page))
            $("#image_upload").rules("remove");
            @endif
            $('#courseform').validate().settings.ignore = "";
            CKEDITOR.instances.description.updateElement();
            CKEDITOR.instances.what_learner_learn.updateElement();
            if ($("#courseform").valid()) {
                $("#courseform").trigger("submit");
            }
        })
    });
</script>
@stop