<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users=User::orderBy('id','desc')->paginate(10);
        return view('users.index',['users'=>$users,]);
    }
     public function show($id)
     {
         $user=User::findOrFail($id);
         
         $user->loadRelationshipCounts();
         $tsubuyakis=$user->tsubuyakis()->orderBy('created_at','desc')->paginate(10);

         return view('users.show',[
             'user'=>$user,
             'tsubuyakis'=>$tsubuyakis,
             ]);

     } 
     
        public function sasatteru($id)
    {
        $user=User::findOrFail($id);
        $user->loadRelationshipCounts();
        $tsubuyakis=$user->sasatteru()->paginate(10);
        
        return view('sasatta.tsubuyaki',[
            'user'=>$user,
            'tsubuyakis'=>$tsubuyakis,
        ]);
    }
}