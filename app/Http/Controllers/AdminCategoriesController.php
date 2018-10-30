<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoriesRequest;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Session;


class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate(5);
        return view('admin.categories.index', compact('categories', 'post_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        //
        $category = Category::create($request->all());

        Session::flash('created_category', 'The category ' . $category->name . ' has been created');

        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categories = Category::whereId($id)->get();
        $posts = Post::whereCategoryId($id)->get();

        return view('admin.categories.show', compact('posts', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        //
        $category = Category::findOrFail($id);

        $category->update($request->all());

        Session::flash('updated_category', 'The category ' . $category->name . ' has been updated');

        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::findOrFail($id);

        $category->posts()->delete();

        $category->delete();

        Session::flash('deleted_category', 'The category ' . $category->name . ' and associated posts have been deleted');

        return redirect('/admin/categories'); 
    }

    public function categoryposts()
    {
        $categories = Category::paginate(2);

        $posts = Post::all();

        return view('admin.categories.categoryposts', compact('categories', 'posts'));

        // foreach ($categories as $category) {
        //     echo $category->name. '<br>';
        //     foreach ($category->posts as $post) {   
        //         echo $post->title . '<br>';
        //     }
        // }

    }
}
