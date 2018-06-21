<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Posts;

class PostController extends Controller
{
    public function index()
    {
        return Posts::all();
    }
 
    public function show(Posts $post)
    {
       return $post;
    }

    public function store(Request $request)
    {
        return Posts::create($request->all());
    }

    public function update(Request $request, Posts $post)
    {
        $post->update($request->all());

        return response()->json($post, 200);
    }

    public function delete(Request $request, Posts $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }
}
