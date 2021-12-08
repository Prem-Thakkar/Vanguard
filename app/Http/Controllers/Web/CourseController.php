<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Datatables;
use Vanguard\Course;
use Vanguard\UserCourse;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Course::query();
            return Datatables::of($data)
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('manage_courses.edit', $row->id) . '"><i class="fas fa-edit"></i></a>';

                    $btn .= '<a href="' . route('manage_courses.destroy', $row->id) . '" class="ml-2" title="" data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="' . __('courses.delete_modal.confirm_label') . '" data-confirm-text="' . __('courses.delete_modal.comfirm_message') . '" data-confirm-delete="' . __('courses.delete_modal.comfirm_button') . '">
                    <i class="fas fa-trash"></i>
                    </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->make(true);
        }
        return view("courses.index");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("courses.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('image_upload')->store('public/upload/course-images');
        $name = $request->file('image_upload')->hashName();

        $addnewcourse  = new Course;
        $addnewcourse->title = $request->title;
        $addnewcourse->description = $request->description;
        $addnewcourse->what_learner_learn = $request->what_learner_learn;
        $addnewcourse->video_url = $request->video_url;
        $addnewcourse->image =  $name;
        $addnewcourse->save();

        return redirect()->route('manage_courses.index')->withSuccess(__('Course created successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course  = Course::findOrfail($id);
        return view("courses.add", compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editcourse  = Course::find($id);
        $editcourse->title = $request->title;
        $editcourse->description = $request->description;
        $editcourse->what_learner_learn = $request->what_learner_learn;
        $editcourse->video_url = $request->video_url;
        if (!empty($request->file('image_upload'))) {
            $path = $request->file('image_upload')->store('public/upload/course-images');
            $name = $request->file('image_upload')->hashName();
            $editcourse->image =  $name;
        }
        $editcourse->save();

        return redirect()->route('manage_courses.index')->withSuccess(__('Course updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteCourse = Course::find($id)->delete();
        return redirect()->route('manage_courses.index')->withSuccess(__('Course deleted successfully.'));
    }

    public function list(Request $request)
    {
        $usercourses = UserCourse::with('course')->where('user_id', auth()->user()->id)->get();
        return view('courses.list',compact('usercourses'));
    }

    public function detail($id)
    {
        $isCourseFourUser = UserCourse::where('user_id', auth()->user()->id)->where('course_id', $id)->count();
        if ($isCourseFourUser == 0 ) {
            abort(403);
        }

        $course = Course::findOrFail($id);

        return view('courses.detail',compact('course'));
    }
}
