<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class FrontendController extends Controller {
   public function index(){
    $posts = Post::latest()->paginate(5);
    $categories = Category::all();
    $tags = Tag::all();
    return view('frontend.home', compact('posts', 'categories', 'tags'));
}


   public function show($slug){
      $post = Post::where('slug', $slug)->firstOrFail();
      return view('frontend.post', compact('post'));
   }
   public function search(Request $request) {
    $query = $request->input('q');
    $posts = Post::where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->paginate(5);
    return view('frontend.search', compact('posts', 'query'));
}

public function category($slug){
    $category = Category::where('slug', $slug)->firstOrFail();
    $posts = $category->posts()->paginate(5);
    return view('frontend.category', compact('category','posts'));
}

public function tag($slug){
    $tag = Tag::where('slug', $slug)->firstOrFail();
    $posts = $tag->posts()->paginate(5);
    return view('frontend.tag', compact('tag','posts'));
}


}
