<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Events\PostCreated;
use Illuminate\Support\Facades\Queue;
use App\Jobs\SendNewPostNotification;
use Auth;

class PostController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }
    public function loginAction(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $posts = Post::with('user')->get();
            return view('posts', compact('posts'));
        } else {
            echo "wrong credentails";
        }
    }
    public function createPost()
    {
        return view('create_post');
    }
    public function createPostAction(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);


        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);
       
        event(new PostCreated($post));

      
        SendNewPostNotification::dispatch($post)->onQueue('emails');

        return response()->json($post, 201);
    }
}
