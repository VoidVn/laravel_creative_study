<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        /*$category = Category::find(2);
        $post = Post::find(2);
        dump($category->posts);
        dd($post->category);*/

        /*$post = Post::find(1);
        dump($post->tags);

        $tag = Tag::find(1);
        dump($tag->posts);*/

        $posts = Post::all();

        return view('post.index', compact('posts'));
        //return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        /*foreach ($tags as $tag) {
            PostTag::firstOrCreate([
                'tag_id' => $tag,
                'post_id' => $post->id
            ]);
        }*/

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();
        /*$data = request()->validate([
            'title' => 'string',
            'post_content' => 'string',
            'image' => 'string',
            'category_id' => 'int',
            'tags' => ''
        ]);*/
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }

    /*public function index()
    {
        $posts = Post::all();

        //return view('posts', compact('posts'));
        return view('posts', ['posts' => $posts]);
    }

    public function create()
    {
        $postsArr = [
            [
                'title' => 'test 4',
                'content' => 'test content4',
                'likes' => 10,
            ],
            [
                'title' => 'test 5',
                'content' => 'test content5',
                'likes' => 11,
            ],
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }

        dd('awd');
    }

    public function update()
    {
        $post = Post::find(1);

        $post->update([
            'active' => '1'
        ]);
    }

    public function delete()
    {
        $post = Post::find(1);

        $post->delete();
    }

    public function restore()
    {
        $post = Post::withTrashed()->find(1);

        $post->restore();
    }

    public function firstOrCreate()
    {
        $post = Post::find(1);
        $anotherPost = [
            'title' => 'test another',
            'content' => 'test content another',
            'likes' => 10,
        ];

        $myPost = Post::firstOrCreate(
            [
                'title' => 'test1'
            ],
            $anotherPost
        );

        return $myPost;
    }

    public function updateOrCreate()
    {
        $post = Post::find(1);
        $anotherPost = [
            'title' => 'test another',
            'content' => 'test content another123',
            'likes' => 10,
        ];

        $myPost = Post::updateOrCreate(
            [
                'title' => 'test another'
            ],
            $anotherPost
        );

        return $myPost;
    }


    public function tell(Post $post)
    {
        return $post;
    }*/
}
