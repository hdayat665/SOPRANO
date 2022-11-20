<?php

namespace App\Http\Controllers;

use App\Services\SMSServices;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    public function writeSMS(Request $r)
    {
        $ws = new SMSServices;
        $input = $r->input();
        $data = $ws->write($input);

        return \response()->json(['status' => $data['status'] , 'msg'=>$data['msg'], 'data'=>$data]);
    }

    public function consumeSMS()
    {
        $ws = new SMSServices;
        $data = $ws->updateStatusToConsume();

        return \response()->json(['status' => true , 'msg' => 'Success', 'data'=>$data]);
    }

    public function getAllSMSNoInQueue()
    {
        $ws = new SMSServices;
        $data = $ws->getAllSMSNoInQueue();

        return \response()->json(['status' => true , 'msg' => 'Success', 'data'=>$data]);
    }

    public function getAllSMSInQueue()
    {
        $ws = new SMSServices;
        $data = $ws->getAllSMSInQueue();

        return \response()->json(['status' => true , 'msg' => 'Success', 'data'=>$data]);
    }
}
