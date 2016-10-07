<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 namespace App\Http\Controllers;
 use App\music;
 use Illuminate\Http\Request;
 use App\Http\Requests\StoreMusicRequest;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Facades\File;
 use Illuminate\Http\Response;
 use Intervention\Image\Facades\Image;
class ProfileController extends Controller{
public function register (){
    return view('Profilepage')->with(['name'=>Auth::user()->name,'user'=>Auth::user()]);
//    $url = Storage::url('music1.png');
   
}
public function create(StoreMusicRequest $request){
    $newMusic=new music;//new 一个实力出来。
    $newMusic->song_name=$request->song_name;//request是用来获得表单信息。获得view里面的表单信息付给music下面的song_name。
    $newMusic->singer_name=$request->singer_name;
    $newMusic->admin_id=Auth::user()->id;//得到id然后付给admin_id.
    $file=Image::make($request->file('song_picture'))->resize(40,40);
    $filename=$request->song_name.'-songpic.jpg';
    $newMusic->save();//保存
    if($file){
        Storage::disk('local')->put($filename,$file->stream());
        return redirect('home');//返回home
    }
   
}
public function edit(Request $request){
    \App\music::where('song_name',$request->original_song_name)->
            //request接受表单信息，然后在music里面找
             update(['singer_name'=>$request->edit_singer_name,'song_name'=>$request->edit_song_name]);
     $img=Image::make($request->file('updateSongPicture'))->resize(40,40);
     Storage::disk('local')->put($request->edit_song_name.'-songpic.jpg',$img->stream());
       return redirect('home');//更改表单数据。然后返回home.
}
public function delete(Request $request){
//    $result=\App\music::find(Auth::user()->name);
    \App\music::where('song_name',$request->delete_song_name)->delete();
//            where('song_name',$request->delete_song_name)->delete();
    Storage::delete($request->delete_song_name.'-songpic.jpg');
    return redirect('home');
}
public function savephoto(Request $request){
    $user=Auth::user();
//    $file=$request->file('image');
    $filename=$user->id.'-DP.jpg';
    $file=Image::make($request->file('image'))->resize(400,500);
if($file){
   
    Storage::disk('local')->put($filename,$file->stream());
}
return redirect('after_register'); 
}
public function getphoto($filename){
    $file=Storage::disk('local')->get($filename);
//    $img=Image::make($file)->resize(400,400);
//    return $img->response('jpg');
    return new Response($file,200);
}
public function getpicture($filename){
    $file=Storage::disk('local')->get($filename);
    return new Response( $file, 200);
}
}