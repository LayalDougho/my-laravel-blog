<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;



class PostController extends Controller
{
    public function index(Request $request){
      // $posts = Post::all();
        $query = Post::Query();
        if ($request->has('search') && $request->search != ''){
            $search= $request->search;

            $query->where('title','like', "%{search}%")->orWhere('body','like',"%{search}%");
        }
        
        // $posts = Post::latest()->paginate(10);
        $latestPosts= Cache::remember('latestPosts', 3600 , function(){
            return Post::with('user')->latest()->take(5)->get();
        });
        $posts = Post::with('user')->latest()->paginate(10);
        return view('index', [
            'posts' => $posts,
            'latestPosts' => $latestPosts
        ]);
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('article-single', [
            'post' => $post
        ]);
    }

    public function create(){
        return view('posts.create');

    }

    public function store(Request $request){

        $request->validate([
            'title'=> 'required|unique:posts|max:255',
            'body'=> 'required|min:10',
            'cover_image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath=null;
        if($request->hasFile('cover_image')){
            $imagePath= $request->file('cover_image')->store('posts','public');
        }

        $slug = Str::slug($request->title);
        Post::create([
            'title'=> $request->title,
            'body'=> $request->input('body'),
            'slug'=>$slug,
            'cover_image'=> $imagePath,
            'user_id'=>Auth::id(),
        ]);
        Cache::forget('latest_posts');
        return redirect('/')->with('success','تم حفظ المقال بنجاح!');

        
    }

     public function edit($slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        $this->authorize('update',$post);
        return view('posts.edit', [
            'post' => $post
        ]);
    }

     public function update(Request $request, $slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        $this->authorize('update',$post);
        $request->validate([
            'title'=>'required|max:255|unique:posts,title'.$post->id,
            'body'=> 'required|min:10',
            'cover_image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath= $post->cover_image;
        if($request->hasFile('cover_image')){
            if($post->cover_image){
                Storage::disk('public')->delete($post->cover_image);
            }
            $imagePath=$request->file('cover_image')->store('posts','public');

        }

        $newSlug= Str::slug($request->title);

        $post->update([
            'title'=>$request->title,
            'body'=>$request->body,
            'slug'=>$newSlug,
            'cover_image'=>$imagePath,
        ]);
        Cache::forget('latest_posts');
        return redirect('/')->with('info','تم تعديل المقال بنجاح!');
    } 

    public function destroy($slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        $this->authorize('delete',$post);
        $post->delete();
        Cache::forget('latest_posts');
        return redirect('/')->with('warning','تم الحذف بنجاح!');

    }

}
