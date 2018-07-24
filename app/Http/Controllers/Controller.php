<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function count_amount($otsukai) {
        $amount = 0;
        $requests = $otsukai->request;
        foreach ($requests as $request) {
            $amount += $request->amount;
        }
        return $amount;
    }
    
    public function count_amounts($otsukais) {
        $amounts = [];
        foreach ($otsukais as $otsukai) {
            $amount = 0;
            $requests = $otsukai->request;
            foreach ($requests as $request) {
                $amount += $request->amount;
            }
            array_push($amounts, $amount);
        }
        return $amounts;
    }
}
