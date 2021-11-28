<?php

namespace Vanguard\Http\Requests\User;

use Vanguard\Http\Requests\Request;
use Vanguard\User;

class CreateCourseRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'image_upload' => 'required|mimes:jpeg,png,bmp,tiff',
            'what_learner_learn' => 'required',
            'video_url' => 'required'
        ];

        return $rules;
    }
}
