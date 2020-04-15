<?php

namespace App\Http\Controllers;

use App\Comment;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;



class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::all();
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
    public function store(CommentRequest $request)
    {
        $user = JWTAuth::user();
        $comment = new Comment();

        $comment->body = $request->input('body');
        $comment->gradebook_id = $request->input('gradebook_id');
        $comment->user_id = $user->id;
        $comment->save();

        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = JWTAuth::user();
        $comments = Comment::with('user')->where('gradebook_id', $id)->get();

        foreach($comments as $comment){

            if($comment->user_id == $user->id){
                $comment->isAuth = true;

            }else{

            $comment->isAuth = false;
            }
        }

        return $comments;
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
        $comment = Comment::find($id);
        
        $comment->delete();
    }
}
