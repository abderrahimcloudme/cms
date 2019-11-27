<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
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
    public function store(CreatePostRequest $request)
    {
       $image = $request->image->store('posts');

       Post::create([
        'title' => $request->title,
        'description' => $request->description,
        'content' => $request->content,
        'image' => $image,
        'publier_le' => $request->publier_le,
       ]);

       session()->flash('success', 'Post was created successfuly.');

       return redirect(route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
$image = $request->image->store('posts');
        $post->update([

            

                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'image' => $image,
    
         ]);

    session()->flash('success','Posts Updated succesfully');

    return redirect(route('posts.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        
        if($post->trashed()){
                Storage::delete($post->image);

            $post->forceDelete();
        }else{
            $post->delete();
        }
        
        session()->flash('success', 'Post has been deleted');
        return redirect(route('trashed-posts.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed()

    {
        $posts = Post::withTrashed()->get();

         return view('posts.index')->with('posts', $posts);
    }



}
