<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts=Post::get();
        return view('dashboard',compact('posts'));
    }
    public function addpost(){
        return view('addpost');
    }

    public function storepost(Request $request){
        $title=$request->title;
        $img=$request->file('img');
        $img_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        $img_url='upload/'.$img_name;
        $img->move(public_path('upload'),$img_name);

        Post::insert([
            'title'=>$title,
            'img_url'=>$img_url,
        ]);


        return redirect()->route('dashboard');
    }

    public function editpost($id)
    {
       $post= Post::where('id',$id)->first();
        return view('editpost',compact('post'));
    }
    public function updatepost(Request $request){
        if($request->file('img')){
            $title=$request->title;
            $postid=$request->postid;
            $img=$request->file('img');
            $img_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $img_url='upload/'.$img_name;
            $img->move(public_path('upload'),$img_name);

            Post::where('id',$postid)->update([
                'title'=>$title,
                'img_url'=>$img_url,
            ]);

            return redirect()->route('dashboard');
        }else{
            $title=$request->title;
            $postid=$request->postid;

            Post::where('id',$postid)->update([
                'title'=>$title,
            ]);

            return redirect()->route('dashboard');
        }
    }

    public function deletepost($id){
        Post::findOrFail($id)->delete();
        return redirect()->back();
    }

}
