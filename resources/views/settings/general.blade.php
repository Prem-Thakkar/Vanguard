@extends('layouts.app')

@section('page-title', __('General Settings'))
@section('page-heading', __('General Settings'))

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">
        @lang('Settings')
    </li>
    <li class="breadcrumb-item active">
        @lang('General')
    </li>
@stop

@section('content')

@include('partials.messages')

{!! Form::open(['route' => 'settings.general.update', 'id' => 'general-settings-form']) !!}

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">@lang('Name')</label>
                    @php 
                     $setting = \DB::table('settings')->where('key', 'app_name')->select('value')->first();
                    @endphp
                    <input type="text" class="form-control input-solid" id="app_name"
                           name="app_name" value="{{ isset($setting->value) ? $setting->value : 'Vanguard' }}">
                </div>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">
    @lang('Update')
</button>

{{ Form::close() }}
@stop
