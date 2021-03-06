<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TsubuyakiController extends Controller
{
    public function index()
    {
        $data=[];
        if(\Auth::check())
        {
            $user=\Auth::user();
            $tsubuyakis=$user->feed_tsubuyakis()->orderBy('created_at','desc')->paginate(10);
            $data=[
                'user'=>$user,
                'tsubuyakis'=>$tsubuyakis,
            ];
        }
        
    return view('welcome',$data);
    }
    
    public function store(Request$request)
    {
        $request->validate([
            'content'=>'required|max:255',]);
            
        $request->user()->tsubuyakis()->create([
            'content'=>$request->content,]);
        return back();        
    }
    public function destroy($id)
    {
        $tsubuyakis=\App\Tsubuyaki::findOrFail($id);
        
        if(\Auth::id()==$tsubuyakis->user_id){
            $tsubuyakis->delete();
        }
        
        return back();
    }
}
