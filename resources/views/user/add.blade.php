@extends('layouts.app')

@section('page-title', __('Add User'))
@section('page-heading', __('Create New User'))

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{ route('users.index') }}">@lang('Users')</a>
</li>
<li class="breadcrumb-item active">
    @lang('Create')
</li>
@stop

@section('content')

@include('partials.messages')

{!! Form::open(['route' => 'users.store', 'files' => true, 'id' => 'user-form']) !!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    @lang('User Details')
                </h5>
                <p class="text-muted font-weight-light">
                    @lang('A general user profile information.')
                </p>
            </div>
            <div class="col-md-9">
                @include('user.partials.details', ['edit' => false, 'profile' => false])
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    @lang('Login Details')
                </h5>
                <p class="text-muted font-weight-light">
                    @lang('Details used for authenticating with the application.')
                </p>
            </div>
            <div class="col-md-9">
                @include('user.partials.auth', ['edit' => false])
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    @lang('courses.course_details')
                </h5>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="first_name">{{__('courses.page_name')}}</label>
                    <select multiple="" type="text" class="form-control input-solid" id="courses" name="courses[]">
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">
            @lang('Create User')
        </button>
    </div>
</div>
{!! Form::close() !!}

<br>
@stop

@section('scripts')
{!! HTML::script('assets/js/as/profile.js') !!}
{!! JsValidator::formRequest('Vanguard\Http\Requests\User\CreateUserRequest', '#user-form') !!}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $("#courses").select2();
</script>

@stop