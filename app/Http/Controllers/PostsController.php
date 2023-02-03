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
        //dd($post);デバック
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

    public function update(Request $request)
    {
        $id = $request->input('id');
        //inputの中のidはname属性
        $up_post = $request->input('upPost');
        //dd($up_post);
        Post::where('id', $id)->update(['post' => $up_post]);
        // ''の中身はカラム名「,」はイコール
        return redirect('/top');
    }

}
