<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
   
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;
//        / get acess the authentication user via the Auth facade.得到user 的信息。user是个对象。得到她的id, var_dump查看。/
        $admin= \App\Administrator::find($id);
//       得到数据库红对应的user 通过model,获得Administrator。把找到的id付给admin.
        return view('home')->with('song_info',$admin->infos);
        //回到home，然后把数据调出来， song_info 是调用在administrator中infos方法中而给数据源取的名字，然后在blade中可以使用。
    }
}
