<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $post;
    private $category;
    public function __construct(Post $post, Category $category)
    {
        $this->post = $post;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $all_categories = $this->category->all();

        return view('users.post.create')->with('all_categories', $all_categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $this->post->description = $request->description;
        $this->post->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image)); //data:image/jpeg;base64,"converted image data to text"
        $this->post->user_id = Auth::id();
        $this->post->save(); // eloquent

        foreach ($request->category as $category_id):
            $category_post[] = ["category_id" => $category_id];
        endforeach;

        $this->post->category_posts()->createMany($category_post);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //

        return view('users.post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $all_categories = $this->category->all();
        $selected_categories = [];

        foreach ($post->category_posts as $category_post):
            $selected_categories[] = $category_post->category_id;
        endforeach;



        return view('users.post.edit')
            ->with('post', $post)
            ->with('all_categories', $all_categories)
            ->with('selected_categories', $selected_categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        if($request->image){
            $post->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image)); //data:image/jpeg;base64,"converted image data to text"

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // route model binding


        $post->delete();
        return back();
    }
}
