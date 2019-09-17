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
            $posts = Post::with('statuses')->get();
            /* this way will fix the issue of not finding the column of ststus in post table
            for more info please visit https://yajrabox.com/docs/laravel-datatables/master/add-column
            */

            return Datatables::of($posts)->addColumn('status', function($post)
            {
                return $post->latestStatus();
            })->make(true);
        }
        return view('admin.index');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comments(Request $request)
    {

        $id = $request->id;

        // $post =  Post::where('id',$id)->get();

        $post = Post::findOrFail($id);
        //dd($post->statuses);
        //$comments = $post->comments;
        return view('admin.html', compact('post'));

        //return response()->json($post->comments->toArray()) ;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

      if($request->ajax())
      {
        $id = $request->id;

        // $post =  Post::where('id',$id)->get();

        $post = Post::findOrFail($id);
      }
      //dd($post->statuses);
      //$comments = $post->comments;
      return view('admin.html', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
     {

       if($request->ajax() )
       {
         $id = $request->id;
         $post = Post::findOrFail($id);

         $status = $request->get('status');

         $post->setStatus($status);
        // $post->save();
        // dd($post);
       }
         return view('admin.index');
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
