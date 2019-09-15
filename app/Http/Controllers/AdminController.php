<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

use DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if ($request->ajax()) {

       $posts = Post::with('stage')->get();

        return Datatables::of($posts)->make(true);
      }
        return view('admin.index');

    }

    /**
     * Show the approved posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function approved(Request $request)
    {
      if ($request->ajax()) {
      $posts = Post::where('is_approved',1)->get();
      //dd($posts);
      return Datatables::of($posts)->make(true);
    }
      return view('admin.approved');
    }

    /**
     * Show the unapproved posts.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function not_approved()
    {
      $posts = Post::where('is_approved',0)->get();

      return view('admin.not_approved',compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comments(Request $request)
    {

      $id =$request->id ;

      // $post =  Post::where('id',$id)->get();

      $post = Post::findOrFail($id);

      dd($post->stage);
      //$comments = $post->comments;
      return view('admin.html', compact('post') )  ;

      //return response()->json($post->comments->toArray()) ;

    //return view('admin.index');

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
    public function update(Request $request,Post $post)
    {
      // if(request('approve'))
      // {
        $post->is_approved = 1;
        $post->save();
      // }
      // else{
      //   $post->is_approved = 0;
      //   $post->save();
      // }
        // return redirect()->back();
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
