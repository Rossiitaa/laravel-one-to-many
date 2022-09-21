<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostsController extends Controller
{

    protected $validationRules = [
        'title' => 'required|string|max:255|min:3',
        'content' => 'required|string',
        'image' => 'required|string|active_url',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts;
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('admin.posts.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sentData = $request->validate($this->validationRules);

        $newPost = new Post;
        $lastPost = Post::orderBy('id', 'desc')->first();
        $sentData['user_id'] = Auth::user()->id;
        $sentData['date'] = new DateTime();
        $sentData['id'] = $lastPost->id + 1;

        $newPost->create($sentData);

        return redirect()->route('admin.posts.show')->with('message', '"'.$sentData['title'].'" has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', ['post' => $post]);
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
        $sentData = $request->validate($this->validationRules);
        
        $newPost = Post::firstOrFail($id);
        $sentData['user_id'] = Auth::user()->id;
        $sentData['date'] = $newPost->date;
        $sentData['id'] = $newPost->id;
        $newPost->update($sentData);

        return redirect()->route('admin.posts.show', $newPost->id)->with('message', '"'.$sentData['title'].'" has been modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', '"'.$post->title.'" has been deleted');
    }
}
