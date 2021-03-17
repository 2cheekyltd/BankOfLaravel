<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model {
    public static function getTransactions() {
        $transactions = DB::table('transaction')
                            ->join('user', 'transaction.user_id', '=', 'user.id')
                            ->select('transaction.id', 'user.user_id', 'transaction.type', 'transaction.amount', 'transaction.created_at', 'transaction.description')
                            ->orderBy('transaction.id', 'desc')
                            ->get();
        return $transactions;
    }
}
