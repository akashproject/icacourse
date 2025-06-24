<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    //
    public function index($type)
    {
        try {
            $leads = Lead::select();
            switch ($type) {
                case 'crm':
                    $leads = $leads->where('crm_status',"1");
                    break;
                case 'local':
                    $leads = $leads->where('store_area',"0");
                    break;
                case 'backlog':
                    $leads = $leads->where('otp_status',"0");
                    break;
                default:
                    # code...
                    break;
            }

            $leads = $leads->orderBy("id","desc")->paginate(100);
            return view('administrator.leads.index',compact('leads'));

        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }
}
