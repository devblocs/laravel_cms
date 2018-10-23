<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // view user user profile
    public function viewIndex(){
        $user_detail = Auth::user()->user_detail()->first();
        return view('user.index')->with('user_detail', $user_detail);
    }

    public function editProfile(Request $request){

        if($request->query('tab') == 'ud'){
            $user_detail = Auth::user()->user_detail()->first();
            return view('user._ud_edit')->with('user_detail', $user_detail);
        }elseif($request->query('tab') == 'pd'){
            $user_detail = Auth::user()->user_detail()->first();
            return view('user._pd_edit')->with('user_detail', $user_detail);
        }else{
            return view('user.edit');
        }
        
    }


    public function updateProfile(Request $request, $action = null){
        switch($action){
            case 1:
                $user_detail = Auth::user()->user_detail();

                if(count($user_detail->get()) != 0){
                    $update_ud = $user_detail->update($request->except(['_token', '_method']));

                    if($update_ud){
                        return redirect()->route('user.index')->with('status', 'User details updated Successfully');
                    }
                }else{
                    
                    $ud = new UserDetail();

                    $ud->bio = !isset($request->bio) ? "": $request->bio;

                    $ud->age = !isset($request->age) ? "": $request->age;

                    $ud->location = !isset($request->location) ? "": $request->location;

                    $user = Auth::user();

                    $create_ud = $user->user_detail()->save($ud);

                    if($create_ud){
                        return redirect()->route('user.index')->with('status', 'User details saved Successfully');
                    }
                }
                
                break;
            case 2:
                
                break;
            
            default:
                
                $user_update = Auth::user()->update($request->except(['_token', '_method']));

                if($user_update){
                    return redirect()->route('user.index')->with('status', 'User profile updated Successfully');
                }
        }
    }
}
