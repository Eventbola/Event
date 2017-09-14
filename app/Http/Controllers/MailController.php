<?php

namespace App\Http\Controllers;

use App\Models\Access\User\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(){
//        $user = User::where('id', '!=', auth()->user()->id)->get();
        $user=User::all();
        return view('frontend.Event.test')->with('users',$user);
    }

}
