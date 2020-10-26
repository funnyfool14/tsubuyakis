<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class OmoibitoController extends Controller
{
    public function store($id)
    {
        \Auth::user()->follow($id);
        return back();
    }
     public function destroy($id)
    {
        \Auth::user()->unfollow($id);
        return back();
    }
    
        public function followings($id)
    {
        $user=User::findOrFail($id);
        $user->loadRelationshipCounts();
        $followings=$user->followings()->paginate(10);
        
        return view('omoibito.followings',[
            'user'=>$user,
            'users'=>$followings,
        ]);
    }
        
    public function followers($id)
    {
        $user=User::findOrFail($id);
        $user->loadRelationshipCounts();
        $followers=$user->followers()->paginate(10);
        
        return view('omoibito.followers',[
            'user'=>$user,
            'users'=>$followers,
        ]);
    }
}
