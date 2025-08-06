<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class DailyReport extends Command
{
    protected $signature = 'daily:report';
    protected $description = 'Send a daily report of new users and posts to the admin';

    public function handle()
    {
        $today = Carbon::today();

        $newUsers = User::whereDate('created_at', $today)->get();
        $newPosts = Post::whereDate('created_at', $today)->get();

        $adminEmail = 'admin@example.com'; 

        Mail::send('emails.daily_report', [
            'newUsers' => $newUsers,
            'newPosts' => $newPosts,
            'today' => $today->toDateString(),
        ], function ($message) use ($adminEmail) {
            $message->to($adminEmail)
                    ->subject('Daily Report - New Users and Posts');
        });

        $this->info('Daily report sent to admin.');
    }
}
