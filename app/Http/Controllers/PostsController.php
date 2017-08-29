<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Models\Post as shotty;

use Log;

class PostsController extends Controller
{

     protected $table = 'posts';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = shotty::paginate(4);
        $data['posts'] = $posts;
        return view('posts.display',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, shotty::$rules);

        $post1 = new shotty();       
        $post1->title = $request->title;
        $post1->url= $request->url;
        $post1->content  = $request->content;
        $post1->created_by = 1;
        $post1->save();
        Log::info('new add made
            :$post1->title
            :$post1->content
            :$post1->url
            :$post1->created_by');
        return \Redirect::action('PostsController@show',$post1->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = shotty::find($id);
        $data['posts'] = $posts;
        if(!$posts){
            abort(404);
        }
        return view('posts.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data["id"] = $id;
         if(!$id){
            abort(404);
         }
        return view('posts.edit',$data);
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
        $this->validate($request, shotty::$rules);
        
        $post = shotty::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->url;
        $post->save();
        if(!$post){
            abort(404);
        }
    return \Redirect::action('PostsController@show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = shotty::find($id);
        $post->delete();
        if(!$post){
            abort(404);
        }
        return \Redirect::action('PostsController@index');
    }
}
