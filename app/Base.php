<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Base extends Model {
    public static function createData($tbl_name, $data) {
        $id = DB::table($tbl_name)->insertGetId($data);
        if($id) {
            return $id;
        } else {
            return null;
        }
    }
}
