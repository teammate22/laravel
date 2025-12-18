<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCommentController extends Controller
{
    public function myComments()
    {
        $user = Auth::user();

        $rejectedComments = $user->rejectedComments()->with('article')->paginate(10, ['*'], 'rejected_page');
        $pendingComments = $user->pendingComments()->with('article')->paginate(10, ['*'], 'pending_page');

        return view('users.my-comments', compact('rejectedComments', 'pendingComments'));
    }
}
