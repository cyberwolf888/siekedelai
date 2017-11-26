<?php

namespace App\Http\Controllers\Backend;

use App\Models\Member;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        $start_date = date("Y-m-d");
        $end_date = date("Y-m-d", strtotime('-1 week', strtotime($start_date)));
        $sales = Transaction::where('created_at','>=',$end_date)->sum('total');
        //dd($sales);
        $count_transaction = Transaction::where('created_at','>=',$end_date)->count('id');
        $member = User::where('type',3)->where('created_at','>=',date("Y-m-d", strtotime('-4 week', strtotime($start_date))))->count('id');
        $transaction = Transaction::limit(5)->orderBy('id','DESC')->get();
        return view('backend.dashboard.index',[
            'sales'=>$sales,
            'member'=>$member,
            'count_transaction'=>$count_transaction,
            'transaction'=>$transaction
        ]);
    }

}
