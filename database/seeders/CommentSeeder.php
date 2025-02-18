<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'article_id' => 1,
            'comment' => 'wow'
        ]);
        Comment::create([
            'article_id' => 1,
            'comment' => 'keren'
        ]);
        Comment::create([
            'article_id' => 2,
            'comment' => 'oooouw'
        ]);
    }
}
