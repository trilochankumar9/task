<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Services\EmailService; 

class SendNewPostNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            Mail::raw("A new post has been created by " . $this->post->user->name . ". Post title: " . $this->post->title, function ($message) use ($user) {
                $message->to($user->email)->subject('New Post Notification');
            });
        }
    }
}


