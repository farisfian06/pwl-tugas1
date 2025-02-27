<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add(Request $request, $articleId )
    {
        try {
            $validatedComment = $request->validate([
                'comment' => 'required|string|max:500', 
            ]);

            $article = Article::findOrFail($articleId);

            $comment = new Comment([
                'comment' => $validatedComment['comment'],
                'article_id' => $article->id,
            ]);

            $article->comments()->save($comment); 
            return response()->json($comment, 201); 
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Article not found'], 404);
        }
    }

    public function delete($commentId)
    {
        try {
            $comment = Comment::findOrFail($commentId);

            $comment->delete();
            return response()->json(['message' => 'Comment deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Comment not found'], 404);
        }
    }
}
