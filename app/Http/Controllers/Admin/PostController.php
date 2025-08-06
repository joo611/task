<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.posts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2048',
            'phone' => 'required|string|max:20',
        ]);

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }

    public function show(string $id)
    {
        $post = Post::with('user')->findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $users = User::all();
        return view('admin.posts.edit', compact('post', 'users'));
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2048',
            'phone' => 'required|string|max:20',
        ]);

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully');
    }
}
