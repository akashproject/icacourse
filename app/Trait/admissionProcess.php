<?php

namespace App\Trait;
use App\Models\Order;
use App\Models\OrderItem;

trait admissionProcess
{
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function pushToErp($order_id){
        try {
           
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
            return response()->json($e, $this->_statusOK);
        }
    }

}