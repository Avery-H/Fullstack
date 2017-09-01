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
    public function index(Request $request)
    {
        
            if($request->has('q')){
                $q = $request->q;
                var_dump($q);
            }
        // if($user == 'mine'){
        //     var_dump($request->user()->id);
        
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
        $post1->user_id = $request->user()->id;
        $post1->save();
        Log::info('new add made
            :$post1->title
            :$post1->content
            :$post1->url
            :$post1->user_id');
        return \Redirect::action('PostsController@show',$post1->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
            $user = $request->user()->id;
        if($id == 'vic'){
            $posts = \App\User::find($user)->posts;
           $belong = true;
            // foreach ($posts as $post) {
            //     $newArr['']=$post['title'];
            // }
            // foreach ($Arr as $post) {
            //     $newArr['title']= $post['title'];

            // }
            
        }
        else{
            $posts = shotty::find($id);
            $belong = false;
        }
        //var_dump($user);
        $data['belong'] = $belong;
        $data['posts'] = $posts;
         $data['user'] = $user;
        if(!$posts){
            abort(404);
        }
        else if($posts == null){
            dd("stop");
        }
        else{
    
        return view('posts.show',$data);
    }
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
