<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    /**
     * Retrieve all posts and render the 'posts.index' view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param int $id The ID of the resource to display.
     * @return \Illuminate\Contracts\View\View The view for displaying the resource.
     */
    public function show($id)
    {
        // Retrieve the post with the given ID

        // compact('id') creates an associative array with the key 'id' and the value of the parameter $id
        // The view 'posts.show' is rendered with this array as its data
        //$post=Post::findorfail($id);
        $singlePost=Post::where('id', $id)->first();
        return view('posts.show', compact('singlePost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $users=User::all();
        return view('posts.create',compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
            'post_creator'=>['required', 'exists:users,id']
        ]);

        $post=new Post();
        $post->title=$data['title'];
        $post->description=$data['description'];
        $post->user_id=$data['post_creator'];
        $post->save();

        session()->flash('Add', 'Post has been added successfully');

        return redirect('/posts');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findorfail($id);
        return view('posts.edit',compact('post'));
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

        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
            'post_creator'=>'required'
        ]);

        $singlepost=Post::findorfail($id);

        $singlepost->update([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'user_id'=>$data['post_creator']
        ]);

       

        
        return to_route('posts.show', $id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $post=Post::findorfail($id);
        $post->delete();
        return redirect('/posts');
    }
}
