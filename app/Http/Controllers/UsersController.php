<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use SNSuser;
class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function search(Request $request){
        $keyword= $request->input('search');

        if(!empty($keyword)) {
            $users=User::where('username', 'like', '%'.$keyword.'%')->get(); //Userテーブルの中でwhereに入っている条件に合うものを抽出（get）する
        }else {
            $users = User::all(); //Userテーブル全ての情報を持ってくる
        }
        return view('users.search')->with('users',$users);
    }


        }
