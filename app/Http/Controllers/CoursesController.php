<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{    
    public function __invoke()
    {
        $courses= Courses::get();
        return view('Courses.index',[
            'courses' => $courses,
        ]);
    }

    public function create()
    {
        return view('Courses.create');
    }

    public function store(Request $request, Courses $courses)
    {
        $coursesDataValidated= $request->validate($courses->validationRules());

        $path1 = Storage::putFile('coursesImg', $request->file('map_image'));
        $path2 = Storage::putFile('coursesImg', $request->file('promotion_banner'));
        $coursesDataValidated['map_image'] = $path1;
        $coursesDataValidated['promotion_banner'] = $path2;

        $courses->create($coursesDataValidated);
        
        return redirect()->route('courses');
    }

    public function edit($id)
    {
        $course= Courses::where('id', $id)->first();

        return view('Courses.edit', [
            'course' => $course,
        ]);
    }

    public function update(Request $request, Courses $courses, $id)
    {
        $coursesDataValidated= $request->validate($courses->validationRules());

        $path1 = Storage::putFile('coursesImg', $request->file('map_image'));
        $path2 = Storage::putFile('coursesImg', $request->file('promotion_banner'));
        $coursesDataValidated['map_image'] = $path1;
        $coursesDataValidated['promotion_banner'] = $path2;
            
        Courses::where('id', $id)->update($coursesDataValidated);

        return redirect()->route('courses');
    }

    public function delete(Request $request, Courses $courses, $id)
    {
        Courses::where('id', $id)->delete();
        
        return redirect()->route('courses');
    }

    public function showAvailable($id)
    {
        $course= Courses::where('id', $id)->first();

        return view('Courses.edit', [
            'course' => $course,
        ]);
    }
    
    public function showFinished($id)
    {
        $course= Courses::where('id', $id)->first();

        return view('Courses.edit', [
            'course' => $course,
        ]);
    }
}
