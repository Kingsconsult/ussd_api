<?php

namespace App\Http\Controllers;

use App\Balance;
use Illuminate\Http\Request;

use Validator;
use illuminate\Http\Response;


class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balance $balance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balance $balance)
    {
        //
    }
    public static function session(Request $request)
    {
        //$request->all();
        $text = $request->input('text');
        $session_id = $request->input('sessionId');
        $phone_number = $request->input('phoneNumber');
        $service_code = $request->input('serviceCode');
        $network_code = $request->input('networkCode');
        $level = explode("*", $text);

        // print_r($level);
        // exit();
        //if (isset($text)) {

        if ($text == "") {
            $response = "CON Welcome John Doe\n";
            $response .= "1. Account Bal\n";
            $response .= "2. Transfer \n";
            $response .= "3. Airtime Recharge \n";
            $response .= "0. Exit";
        }


        if (isset($level[0]) && $level[0] == 1 && !isset($level[1])) {
            $response = "END Your account Bal: \n";
            $response .= " #50,000.00 \n";
        }
        if (isset($level[0]) && $level[0] == 0 && !isset($level[1])) {
            $response = "END Goodbye \n";
            $response .= " Thank you for banking with us. \n";
        }
        if (isset($level[0]) && $level[0] == 2 && !isset($level[1])) {
            $response = "CON Select Bank \n";
            $response .= "1. GTB\n";
            $response .= "2. First Bank \n";
            $response .= "3. Access Bank \n";
            $response .= "4. FCMB \n";
            $response .= "0. back";
        }
        if (isset($level[0]) && $level[0] == 2  && isset($level[1]) && !isset($level[2])) {
            $response = "CON enter Acct. No.\n";
        }
        if (isset($level[0]) && $level[0] == 2  && isset($level[1])  && isset($level[2])) {

            $response = "END Transaction Successful \n";
            $response .= "thanks for patronage \n";
        }
        header('Content-type: text/plain');
        echo $response;
        //}
    }

    public function getBalance(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'session_id' => 'required',
            // 'phone_no' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()], 400);
        }

        $phone_no = $request['phone_no'];

        if (!isset($phone_no)) {
            $response = "CON 1. Enter phone number. \n";
        };
        $user = Balance::where('phone_no', $request['phone_no'])->first();

        // if(($user== null)){
        //     $response = "END\n Number does not exist. \n";
        //     $response .= "Check the number and try again later. \n";
        //     $response .= "Thanks for using using Kings Network . \n";
        // }


        // print_r($user);
        // exit();

        $code = $request['code'];

        // $user = Balance::where('phone_no', $phone_no)->first();

        if (isset($user->phone_no)) {
            if ($code == "") {
                $response = "CON\n 1. Enter 1 to check your data balance.\n";
                $response .= "2. Enter 2 to quit";
            }

            if ($code == 1) {
                $response = response()->json([
                    'data_bal' => (float) $user->balance,
                ]);
            }

            if ($code == 2) {
                $response = "END\n Transaction Completed \n";
                $response .= "Thanks for using using Kings Network \n";
            }
        }
        return $response;
    }
}
