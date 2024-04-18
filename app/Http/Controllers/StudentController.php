<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class StudentController extends Controller
{
    public function index(){

        $data = array("students" => DB::table('students')->orderBy('created_at','desc')->paginate(10));
        return view('students.index', $data);
    }

    public function create(){
        return view('students.create')->with('title', 'Add New');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => ['required', 'min:4'],
            "age" => ['required'],
            "email" => ['required', 'email']
        ]);

        Student::create($validated);

        return redirect('/')->with('message', 'New student was added successfully!');
    }

    public function update(Request $request, Student $students){
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email']
        ]);

        //dd($request);
        // if($request->hasFile('student_image')){
        //     $request->validate([
        //         "student_image" => 'mimes:jpeg,png,bmp,tiff |max:4096'
        //     ]);

        //     $filenameWithExtension = $request->file('student_image');

        //     $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        //     $extension = $request->file('student_image')->getClientOriginalExtension();

        //     $filenameToStore = $filename.'_'.time().'.'.$extension;

        //     $request->file('student_image')->storeAs('public/student', $filenameToStore);
        //     $request->file('student_image')->storeAs('public/student/thumbnail', $filenameToStore);

        //     $thumbNail = 'storage/student/thumbNail/'.$filenameToStore;
        //     $this->createThumbnail($thumbNail, 150, 93);

        //     $validated['student_image'] = $filenameToStore;
        // }
        $students->update($validated);
        return back()->with('message', 'Student was successfully updated!');
    }

    public function destroy(Student $students){
        $students->delete();

        return redirect('/')->with('message', 'Student was successfully deleted!');
    }

    // public function createThumbnail($path, $width, $height){
    //     $img = new ImageManager(new Driver());
    //     $img = ImageManager::make($path)->resize($width, $height, function($constraint){
    //         $constraint->aspectRatio();
    //     });
    //     $img->save($path);
    // }

    public function show($id){
        $data = Student::findOrFail($id);

        return view('students.edit', ['students' => $data]);
    }
}
