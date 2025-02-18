<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'Artikel 1',
            'content' => 'Content 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates ipsa est qui natus beatae vitae autem excepturi omnis ex esse.'
        ]);

        Article::create([
            'title' => 'Artkel 2',
            'content' => 'Content 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates ipsa est qui natus beatae vitae autem excepturi omnis ex esse.'
        ]);
    }
}

