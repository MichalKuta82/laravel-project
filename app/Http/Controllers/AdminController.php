<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Comment;
use App\CommentReply;

class AdminController extends Controller
{
    //

    public function index()
    {
    	$postCount = Post::count();
    	$categoriesCount = Category::count();
    	$commentsCount = Comment::count();
    	$repliesCount = CommentReply::count();
    	$usersCount = User::count();


    	return view('admin.index', compact('postCount', 'categoriesCount', 'commentsCount', 'repliesCount', 'usersCount'));
    }
}
