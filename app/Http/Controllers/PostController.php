<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewPostNotification;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->paginate(10);

        $posts->getCollection()->transform(function ($post) {
            $post->description = substr($post->description, 0, 512);
            return $post;
        });

        return response()->json($posts);
    }

    public function publicIndex()
    {
        $posts = Post::latest()->paginate(12);

        $posts->getCollection()->transform(function ($post) {
            $post->description = substr($post->description, 0, 512);
            return $post;
        });

        return view('posts.public_index', compact('posts'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:2048',
            'phone'       => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $post = Post::create([
            'user_id'     => auth()->id(),
            'title'       => $request->title,
            'description' => $request->description,
            'phone'       => $request->phone,
        ]);

        $admins = User::where('is_admin', true)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewPostNotification($post));
        }

        return response()->json([
            'message' => 'Post created successfully',
            'post'    => $post,
        ], 201);
    }

    public function publicStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:2048',
            'phone'       => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $post = Post::create([
            'user_id'     => auth()->id(),
            'title'       => $request->title,
            'description' => $request->description,
            'phone'       => $request->phone,
        ]);

        $admins = User::where('is_admin', true)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewPostNotification($post));
        }

        return back()->with('success', 'Post created successfully!');
    }
}
