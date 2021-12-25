<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="first_name">@lang('Role')</label>
            {!! Form::select('role_id', $roles, $edit ? $user->role->id : '',
            ['class' => 'form-control input-solid', 'id' => 'role_id', $profile ? 'disabled' : '']) !!}
        </div>
        @if($edit)
            <div class="form-group">
                <label for="status">@lang('Status')</label>
                {!! Form::select('status', $statuses, $edit ? $user->status : '',
                ['class' => 'form-control input-solid', 'id' => 'status', $profile ? 'disabled' : '', $user->id == auth()->user()->id ? 'disabled' : '']) !!}
            </div>
        @else
            <div class="form-group">
                <label for="status">@lang('Status')</label>
                {!! Form::select('status', $statuses, $edit ? $user->status : '',
                ['class' => 'form-control input-solid', 'id' => 'status', $profile ? 'disabled' : '']) !!}
            </div>
        @endif
        <div class="form-group">
            <label for="first_name">@lang('First Name')</label>
            <input type="text" class="form-control input-solid" id="first_name" name="first_name" placeholder="@lang('First Name')" value="{{ $edit ? $user->first_name : '' }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="birthday">@lang('Date of Birth')</label>
            <div class="form-group">
                <input type="text" name="birthday" id='birthday' value="{{ $edit && $user->birthday ? $user->present()->birthday : '' }}" class="form-control input-solid" />
            </div>
        </div>
        <div class="form-group">
            <label for="phone">@lang('Phone')</label>
            <input type="text" class="form-control input-solid" id="phone" name="phone" placeholder="@lang('Phone')" value="{{ $edit ? $user->phone : '' }}">
        </div>
        <div class="form-group">
            <label for="address">@lang('Address')</label>
            <input type="text" class="form-control input-solid" id="address" name="address" placeholder="@lang('Address')" value="{{ $edit ? $user->address : '' }}">
        </div>
    </div>

        <div class="col-md-6 form-group">
            <label for="address">@lang('Country')</label>
            {!! Form::select('country_id', $countries, $edit ? $user->country_id : '', ['class' => 'form-control input-solid']) !!}
        </div>
        <div class="col-md-6 form-group">
            <label for="driving_licence">@lang('Driving Licence')</label>
            <input type="text" class="form-control input-solid" id="driving_licence" name="driving_licence" placeholder="@lang('Driving Licence')" value="{{ $edit ? $user->driving_licence : '' }}">
        </div>
        @if($edit)
            @if(\Route::currentRouteName() == 'users.edit')
                <div class="form-group col-md-6">
                    <label for="address">@lang('courses.page_name')</label>
                    <select style="width: 100%;" class="custom-select form-control input-solid" data-placeholder="@lang('courses.select_placeholder')" id="courses" name="courses[]" multiple class="form-control">
                        @if(!empty($courses))
                        @foreach($courses as $course)
                        <option @if(in_array($course->id,$usercourses)) selected="" @endif value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            @endif
        @endif
     @if ($edit)
    <div class="col-md-12 mt-2">
        <button type="submit" class="btn btn-primary" id="update-details-btn">
            <i class="fa fa-refresh"></i>
            @lang('Update Details')
        </button>
    </div>
    @endif
</div>