<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Make sure there's at least one user to assign the post to
        $user = User::first();

        if (!$user) {
            // Create a fallback user if none exists
            $user = User::create([
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => bcrypt('123456'),
                'email_verified_at' => now(),
            ]);
        }

        // Create sample posts
        Post::create([
            'user_id' => $user->id,
            'title' => 'First Post',
            'description' => 'This is the first seeded post.',
            'phone' => '01123223217',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Need a Freelance Designer',
            'description' => 'Looking for a creative designer to work on a logo and branding for a startup project.',
            'phone' => '01010101010',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Laravel Developer Wanted',
            'description' => 'Hiring a Laravel developer for a 2-month remote contract. Must have experience with API integration.',
            'phone' => '01234567890',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Selling Used Laptop',
            'description' => 'Dell XPS 13, Intel i7, 16GB RAM, 512GB SSD. Very good condition. Contact for details.',
            'phone' => '01122334455',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Python Tutor Available',
            'description' => 'Experienced tutor offering Python lessons for beginners and intermediate students.',
            'phone' => '01555666777',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Offering Translation Services',
            'description' => 'Professional translator fluent in Arabic, English, and French. Quick delivery and accurate translation.',
            'phone' => '01099887766',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Web Hosting Recommendation',
            'description' => 'Looking for suggestions on reliable and affordable web hosting providers. Any advice is appreciated!',
            'phone' => '01112121212',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Flat for Rent in Nasr City',
            'description' => '3-bedroom apartment available for rent, fully furnished. Family-only. Contact for details.',
            'phone' => '01030303030',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Carpool from 6th October to Zamalek',
            'description' => 'Offering carpool service every morning (7:30 AM) from 6th October City to Zamalek. Seats available.',
            'phone' => '01212121212',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Buy Used Office Furniture',
            'description' => 'Looking to buy good condition office desks and chairs for a co-working space.',
            'phone' => '01444445555',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Digital Marketing Service',
            'description' => 'Offering full-service digital marketing: SEO, ads, social media, content. Affordable packages.',
            'phone' => '01666667777',
        ]);

    }
}
