<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use App\Base;

class TransactionController extends Controller {
    public function createTransaction($type, $amount, $user_id, $dep_id) {
        $date = date('Y-m-d H:i:s');
        $data = array(
            'type' => $type,
            'user_id' => $user_id,
            'amount' => $amount,
            'created_at' => $date,
            'related_id' => $dep_id,
            'description' => ''
        );
        $tbl_name = 'transaction';

        $tran_id = Base::createData($tbl_name, $data);
        return $tran_id;
    }

    public function getTransaction() {
        $transactions = Transaction::getTransactions();
        $transactions = json_encode($transactions);

        echo $transactions;
    }
}
