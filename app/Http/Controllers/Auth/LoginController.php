<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auth;

class LoginController extends Controller {
    public function viewLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $data = array(
            'email'    => $request->email,
            'password' => $request->password
        );

        $response = Auth::login($data);

        if($response == "1") {
            $res = array(
                'state'   => 'success',
                'message' => 'Login Successfully!'
            );
        } else if($response == "2") {
            $res = array(
                'state'   => 'warning',
                'message' => 'Password is inccorrect!'
            );
        } else if($response == "3") {
            $res = array(
                'state'   => 'error',
                'message' => "This email doesn't match with our records!"
            );
        }

        $res = json_encode($res);
        echo $res;
    }
    
    public function viewChgPassword(Request $request)     {
        return view('auth.chgPassword');
    }
    
    public function chgPassword(Request $request)     {
        $user_id = $request->user_id;
        $old_pass = $request->old_pass;
        $new_pass = $request->new_pass;

        $response = Auth::chgPassword($user_id, $old_pass, $new_pass);

        if($response == "1") {
            $res = array(
                'state'   => 'success',
                'message' => 'Change password Successfully!'
            );
        } else if($response == "2") {
            $res = array(
                'state'   => 'warning',
                'message' => 'Old password is inccorrect!'
            );
        } else if($response == "3") {
            $res = array(
                'state'   => 'error',
                'message' => "This user doesn't match with our records!"
            );
        }

        $res = json_encode($res);
        echo $res;
    }
}
