<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gradebook;
use App\Professor;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\GradebookRequest;


class GradebookController extends Controller
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

            return Gradebook::search($term);
        } else {

            return Gradebook::with('professor')->get();

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Professor::doesntHave('gradebook')->get();;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradebookRequest $request)
    {
        if (!$request->has('name')) {
            abort(400);
        }
        $gradebook = new Gradebook();
        $gradebook->name = $request->input('name');

        if($request->has('professor_id')){
        $professor = Professor::findOrFail($request->input('professor_id'));

        $gradebook->professor_id = $request->input('professor_id');
        
        $gradebook->save();
        $professor->gradebook_id = $gradebook->id;
        $professor->save();

        return $gradebook;

        }
            $gradebook->save();
            
            return $gradebook;
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gradebook = Gradebook::with('professor', 'students')->findOrFail($id);
        $user = JWTAuth::user();
        
        if($gradebook->professor){
            if($gradebook->professor->user_id == $user->id){
                $gradebook->isAuth = true;

                return $gradebook;
            }
        }
                $gradebook->isAuth = false; 
                
            return $gradebook;
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
        $gradebook = Gradebook::find($id);
        
        $gradebook->name = $request->name;
        if($request->input('professor')){
            $gradebook->professor_id = $request->input('professor');
            $professor = Professor::find($request->input('professor'));
            $professor->gradebook_id = $id;
            $professor->save(); 
        }
        $gradebook->save(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gradebook = Gradebook::find($id);

        $gradebook->delete();
    }
    public function my_gradebook()
    {
        $user = JWTAuth::user();

        $professor = Professor::with('gradebook', 'students')->where('user_id', $user->id)->first();
        $professor->gradebook->isAuth = true;

        return $professor;

    }
}
