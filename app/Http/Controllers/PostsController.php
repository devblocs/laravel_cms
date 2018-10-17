<?php

namespace App\Http\Controllers;


use App\Categories; // importing catgeories model
use App\User;   // importing the user model
use Illuminate\Support\Facades\Auth; // importing Auth facade
use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // index page for all user created posts
        $posts = Auth::user()->posts;

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:5',
            'body' => 'required'
        ]);

        if($validate){
            $post = Auth::user()->posts()->create($request->all());

            if($post){
                return redirect()->route('post.index')->with('status', 'Post Created Successfully');
            }

            return "Post Creation Failed";
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
        // retreive the post with id of authenticated user 
        $post = Auth::user()->posts()->where('id', $id)->first();

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Auth::user()->posts()->whereId($id)->first();

        if($post->user_id != Auth::user()->id){
            return redirect()->redirect('post.index')->with('error', "You are not allowed to edit other user post!");
        }

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
        // validate data
        $validate = $request->validate([
            'title' => 'required|min:5',
            'body' => 'required'
        ]);

        if($validate){
            $update_post = Auth::user()->posts()->where('id', '=', $id)->update($request->except(['_token', '_method']));

            if($update_post){
                return redirect()->route('post.index')->with('status', "Post updated successfully!");
            }

            return redirect()->back()->with(['id' => $id, 'error' => "OOPS! Something went wrong!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->posts()->where('id', $id)->delete($id)){
            return redirect()->route('post.index')->with('status', "Post deleted successully!");
        }
    }
}
