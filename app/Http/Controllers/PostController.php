<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::where('user_id', auth()->id())->paginate(config('settings.per_page_items'));

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $this->storePost();

        session()->flash('success', 'Post successfully created');
        return redirect()->route('post.index');

    }

    private function storePost()
    {
        $post = new Post();
        $post->title = request()->post_title;
        $post->body = request()->post_content;

        if(request()->post_scheduler){
            $post->schedule_date = request()->post_scheduler;
        }
        if(!request()->post_scheduler){
            $post->status = 'published';
        }
        $post->photo_path = request()->post_featured_image->store('/post');
        $post->user_id = auth()->id();

        $post->save();

        $post->categories()->sync(request()->post_categories);

        return $post;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->post_title,
            'body' => $request->post_content,
            'schedule_date' => $request->post_scheduler,
            'title' => $request->post_title,
            'title' => $request->post_title,
            'title' => $request->post_title,
        ]);

            if(request()->post_featured_image){
                $post->update([
                    'photo_path' => request()->post_featured_image->store('/post')
                ]);
            }

        if(request()->post_scheduler){
            $post->schedule_date = request()->post_scheduler;
        }

        if(request()->post_categories){
            $post->categories()->sync(request()->post_categories);
        }

        session()->flash('success', 'Post successfully updated');
        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();

        session()->flash('success', 'Post successfully deleted');

        return redirect()->route('post.index');
    }
}
