<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Deposit;

class DepositController extends Controller {

    public function viewDeposit() {
        return view('main.deposit');
    }

    public function deposit(Request $request) {
        $date = date('Y-m-d H:i:s');
        $data = array(
            'deposit_amount' => $request->deposit_amount,
            'created_at' => $date,
            'user_id' => $request->user_id
        );
        $dep_id = Deposit::deposit($data);

        if($dep_id) {
            $TranCont = new TransactionController;
            $type = "deposit";
            $amount = $request->deposit_amount;
            $user_id = $request->user_id;

            $tran_id = $TranCont->createTransaction($type, $amount, $user_id, $dep_id);
            if($tran_id) {
                $res = array(
                    'state' => 'success',
                    'message' => "Deposit successful!"
                );
            } else {
                $res = array(
                    'state' => 'error',
                    'message' => "Something went wrong!"
                );
            }
        } else {
            $res = array(
                'state' => 'error',
                'message' => "Something went wrong!"
            );
        }

        $res = json_encode($res);
        echo $res;
    }
}
