<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Auth extends Model {
    
    public static function registerUser($data) {
        $flag = DB::table('user')->where('email', $data['email'])->get();

        if($flag) {
            DB::table('user')->insert($data);
            return 1;
        } else {
            return 0;
        }
    }

    public static function login($data) {
        $flag = DB::table('user')->where('email', $data['email'])->get()->first();
        
        if($flag) {
            $flag1 = DB::table('user')->where('password', md5($data['password']))->get()->first();  
            if($flag1) {
                return '1';
            } else {
                return '2';
            }
        } else {
            return '3';
        }
    }

    public static function chgPassword($id, $old, $new) {
        $flag = DB::table('user')->where('id', $id)->get()->first();

        if($flag) {
            $flag1 = DB::table('user')->where('password', md5($old))->get()->first();  
            if($flag1) {
                DB::table('user')->where('id', $id)->update(['password' => md5($new)]);
                return '1';
            } else {
                return '2';
            }
        } else {
            return '3';
        }
    }
}
