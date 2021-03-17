<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auth;

class RegisterController extends Controller {
    
    public function viewRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $data = array(
           'user_id'      => $request->user_id,
           'first_name'   => $request->first_name,
           'last_name'    => $request->last_name,
           'email'        => $request->email,
           'bank_account' => $request->bank_account,
           'phone_num'    => $request->phone_num,
           'password'     => md5($request->password)
        );

        $response = Auth::registerUser($data);

        if($response) {
            $res = array(
                'state'   => 'success',
                'message' => 'Register Successfully!'
            );
        } else {
            $res = array(
                'state'   => 'error',
                'message' => 'Something went wrong!'
            );
        }
        
        $res = json_encode($res);
        echo $res;
    }
}
