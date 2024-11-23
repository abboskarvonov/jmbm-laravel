<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentsController extends Controller
{

    public function index()
    {
        Gate::authorize('admin-settings');

        $comments = Comments::latest()->paginate(15);

        return view('comments.index')->with([
            'comments' => $comments
        ]);
    }

    public function store(Request $request)
    {
        $comment = Comments::create([
            'body' => $request->message,
            'article_id' => $request->article_id,
            'user_id' => Auth::id()
        ]);

        return redirect()->back();
    }

    public function destroy(Comments $comment)
    {
        Gate::authorize('admin-settings');
        Gate::authorize('delete', $comment);

        $comment->delete();

        return redirect()->back();
    }
}
