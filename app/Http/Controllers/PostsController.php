<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Answer;
//use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        //$post = Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('created_at', 'desc')->get();
        //$posts = Post::orderBy('created_at', 'desc')->take(1)->get();

        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
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
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required'
        ]);

        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->link = str_replace("watch?v=", "embed/", $request->input('link'));
        $post->user_id = auth()->user()->id;
        $post->save();  

        return redirect('/posts')->with('success', 'Postagem criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $answers = Answer::where('post_id', $id)->get();
        return view('posts.show')->with('post', $post)->with('answers', $answers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required'
        ]);

        //Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->link = $request->input('link');
        $post->save();  

        return redirect('/posts')->with('success', 'Postagem editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Postagem deletada com sucesso!');
    }
}
