<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class ProfileController extends Controller
{
    public function profile(){
        return  view('profile',array('user' => Auth::user()));
    }
    public function update_avatar(Request $request){
        if($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/img/profile/' . $filename ) );
            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }
        return  view('profile',array('user' => Auth::user()));
    }
}
