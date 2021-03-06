<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Professor;
use App\Gradebook;
use App\Http\Requests\StudentRequest;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        
        $student = new Student();
        $gradebook = Gradebook::where('id', $request->input('id'))->first();

        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->gradebook_id = $request->input('id');
        $student->imageUrl = $request->input('imageUrl');
        $student->professor_id = $gradebook->professor_id;
        $student->save();

        return $student;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $student = Student::find($id);
        $student->first_name = $request->input("first_name");
        $student->last_name = $request->input("last_name");
        $student->imageUrl = $request->input("imageUrl");

        $student->save();

        return $student;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();
    }
}
