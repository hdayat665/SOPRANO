<?php

namespace App\Services;

use Illuminate\Http\Request;

class SMSServices
{
    public function write($r)
    {
        $currentData = file_get_contents('SMSFile.json');
        $arrayData = json_decode($currentData, true);

        $newData = $r;
        $arrayData[] = $newData;

        $final_data= json_encode($arrayData);

     if(file_put_contents('SMSFile.json', $final_data))
     {
        $data['status'] = true;
        $data['msg'] = "Data added Success fully";
        $data['data'] = file_get_contents('SMSFile.json');
     }else{
        $data['status'] = false;
        $data['msg'] = "Data added Failed";
        $data['data'] = '';
     }

     return $data;
    }

    public function updateStatusToConsume()
    {
        $currentData = file_get_contents('SMSFile.json');
        $arrayData = json_decode($currentData, true);

        foreach ($arrayData as $key => $entry) {
            if ($entry['status'] == 'queue') {
                $arrayData[$key]['status'] = "consume";
            }
        }

        $newJsonString = json_encode($arrayData);
        file_put_contents('SMSFile.json', $newJsonString);

        $updatedData = file_get_contents('SMSFile.json');

     return $updatedData;
    }

    public function getAllSMSNoInQueue()
    {
        $currentData = file_get_contents('SMSFile.json');
        $arrayData = json_decode($currentData, true);

        foreach ($arrayData as $entry) {
            if ($entry['status'] == 'queue') {
                $total[] = $entry;
            }
        }

        $totalNumber = count($total);

     return $totalNumber;
    }

    public function getAllSMSInQueue()
    {
        $currentData = file_get_contents('SMSFile.json');
        $arrayData = json_decode($currentData, true);

        foreach ($arrayData as $entry) {
            if ($entry['status'] == 'queue') {
                $total[] = $entry;
            }
        }

     return $total;
    }

}
