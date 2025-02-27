<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::with('comments')->get();
        return response()->json($articles);
    }
    public function detail($id)
    {
        try {
            $article = Article::with('comments')->findOrFail($id);
            return response()->json($article);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Article not found'], 404);
        }
    }

    public function add(Request $request)
    {
        $article = Article::create($request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]));

        return response()->json($article, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->update($request->validate([
                'title' => 'sometimes|string|max:255',
                'content' => 'sometimes|string'
            ]));
            return response()->json($article);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Article not found'], 404);
        }
    }

    public function delete($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->delete();
            return response()->json(['message' => 'Article deleted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Article not found'], 404);
        }
    }

}
