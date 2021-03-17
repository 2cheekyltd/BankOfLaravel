<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Withdraw extends Model {

    public static function withdraw($data) {
        $withdraw_amount = $data['withdraw_amount'];
        $withdraw_amount += 0.0;

        $balance = DB::table('user')->where('id', $data['user_id'])->select('balance')->first();

        if($withdraw_amount > $balance->balance) {
            return '0';
        } else {
            $date = date('Y-m-d H:i:s');
            $data = array(
                'withdraw_amount' => $data['withdraw_amount'],
                'created_at' => $date,
                'user_id' => $data['user_id']
            );
            $with_id = DB::table('withdraw')->insertGetId($data);

            if($with_id) {
                $balance = $balance->balance - $withdraw_amount;
                DB::table('user')->where('id', $data['user_id'])->update(['balance' => $balance]);

                return $with_id;
            } else {
                return null;
            }
        }
    }
}
