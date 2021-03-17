<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Deposit extends Model {

    public static function deposit($data) {
        $id = DB::table('deposit')->insertGetId($data);

        if($id) {
            $balance = DB::table('user')->where('id', $data['user_id'])->select('balance')->first();
            $balance = $balance->balance + ($data['deposit_amount'] + 0.0);

            DB::table('user')->where('id', $data['user_id'])->update(['balance' => $balance]);
            return $id;
        } else {
            return null;
        }
    }
}
