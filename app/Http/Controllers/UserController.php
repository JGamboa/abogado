<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use Image;

class UserController extends AppBaseController
{
    public function profile(){
        return view('user.profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $date_append = date("Y-m-d-His");
            $filename = $date_append . '.' .$avatar->getClientOriginalExtension();
            $folder = storage_path('app/public');

            Image::make($avatar)->resize(300, 300)->save( $folder . '/avatars/' . $filename );

            $user = Auth::user();

            if($user->avatar != "default.jpg"){
               unlink(storage_path('app/public/avatars'. $user->avatar));
            }

            $user->avatar = $filename;
            $user->save();
        }

        return view('user.profile', array('user' => Auth::user()) );

    }
}
