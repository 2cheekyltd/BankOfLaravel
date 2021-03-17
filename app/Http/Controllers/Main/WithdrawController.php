<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Withdraw;

class WithdrawController extends Controller {
    public function viewWithdraw() {
        return view('main.withdraw');
    }

    public function withdraw(Request $request) {
        $data = array(
            'user_id' => $request->user_id,
            'withdraw_amount' => $request->withdraw_amount
        );

        $with_id = Withdraw::withdraw($data);

        if($with_id) {
            if($with_id == '0'){
                $res = array(
                    'state' => 'warning',
                    'message' => "Withdraw amount must be less than ballance!"
                );
            } else {
                $TranCont = new TransactionController;
                $type = "withdrow";
                $amount = $request->withdraw_amount;
                $user_id = $request->user_id;

                $tran_id = $TranCont->createTransaction($type, $amount, $user_id, $with_id);
                if($tran_id) {
                    $res = array(
                        'state' => 'success',
                        'message' => "Withdraw successful!"
                    );
                } else {
                    $res = array(
                        'state' => 'error',
                        'message' => "Something went wrong!"
                    );
                }
            }
            $res = array(
                'state' => 'success',
                'message' => "Withdraw successful!"
            );
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
