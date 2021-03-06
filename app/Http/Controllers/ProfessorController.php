<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Gradebook;
use App\Url;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\GradebookRequest;
use App\Http\Requests\ProfessorRequest;



class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $term = request()->input('term');

        if ($term) {

            return Professor::search($term);
        } else {

            return Professor::with('gradebook', 'urls')->get();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Gradebook::whereNull('professor_id')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorRequest $request)
    {
        $professor = new Professor();
        $imageUrl= new Url();

        $professor->first_name = $request->first_name;
        $professor->last_name = $request->last_name;

        if($request->gradebook_id){

            $professor->gradebook_id = $request->gradebook_id;
            $professor->save();
            $gradebook = Gradebook::find($request->gradebook_id);
            $gradebook->professor_id = $professor->id;
            $gradebook->save();

        }else{
            $professor->save();
        } 
        
        $urls = array();
        $urls= $request->imageUrl;

        if($urls){
            foreach($urls as $url){
                $imageUrl->imageUrl = $url;
                $imageUrl->professor_id = $professor->id;
                $imageUrl->save();
                $imageUrl= new Url();
            };
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Professor::with('students', 'gradebook', "urls")->findOrFail($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
