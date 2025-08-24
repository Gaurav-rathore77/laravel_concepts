<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller {
   public function index(){
      $posts = Post::all();
      return view('admin.posts.index', compact('posts'));
   }

   public function create(){
      $categories = Category::all();
      return view('admin.posts.create', compact('categories'));
   }

   public function store(Request $request){
      $request->validate([
         'title' => 'required',
         'content' => 'required',
      ]);

      $post = new Post();
      $post->title = $request->title;
      $post->slug = Str::slug($request->title);
      $post->content = $request->content;
      $post->category_id = $request->category_id;
      $post->user_id = auth()->id();

      if($request->hasFile('image')){
         $post->image = $request->file('image')->store('uploads','public');
      }
      $post->save();

      return redirect()->route('posts.index')->with('success','Post Created!');
   }
}

