<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::get();
        return view('posts.index',['posts'=>$posts]);//投稿一覧を表示させる変数（$posts）をviewへ渡している
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');//newPost=name属性の値
        $id = Auth::id();
        //dd($post);
        Post::create([
            'post' => $post,
            'user_id' => $id,
        ]);
      return redirect('/top');
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }

    public function updateForm($id)
    {
        $post = Post::where('id', $id)->first();
        return view('posts.updateForm', ['post'=>$post]);
    }

}
