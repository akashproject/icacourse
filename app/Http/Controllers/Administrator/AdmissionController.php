<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trait\admissionProcess;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Student;

class AdmissionController extends Controller
{
    use admissionProcess;
    public function pushToERP(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'order_id' => 'required',
            ]);
            $erp = $this->erpPushProcess($data['order_id']);
            if (!$erp) {
                return redirect()->back()->withErrors('Failed to push on ERP');
            }

            return redirect()->back()->with('message', 'ERP pushed successfully!');

        } catch(\Illuminate\Database\QueryException $e){
            
        }   
        
    }
}
