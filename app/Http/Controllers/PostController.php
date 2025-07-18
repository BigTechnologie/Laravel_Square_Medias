<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("created_at", "desc")->paginate(8);
        return view("posts.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *  Permet d'afficher le formulaire de création d'une nouvelle ressource
     */
    public function create()
    {
        $categories = Category::all();
        return view("posts.create", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(PostFormRequest $request) 
    {
        //
        $data = $request->validated(); 

        Post::create($data);

        return redirect()->route("admin.post.index")->with("success","Votre produit a bien été crée !"); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
