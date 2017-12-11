<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;

class GrafikController extends Controller
{
    public function all()
    {
        return view('backend.grafik.from_all');
    }
    public function result_all(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required|numeric'
        ]);
        $start_date = date('Y/m/d', strtotime($request->start_date));
        $end_date = date('Y/m/d', strtotime($request->end_date));

        $query = TransactionDetail::select(\DB::raw('sum(detail_transaction.qty) AS total, p.name, t.status, t.id as transaction, t.created_at'))
            ->join('product AS p','p.id','=','detail_transaction.product_id')
            ->join('transaction AS t','t.id','=','detail_transaction.transaction_id')
            ->whereRaw('t.created_at >= "'.$start_date.'"')
            ->whereRaw('t.created_at <= "'.$end_date.'"');
        if($request->status != '6'){
            $query->whereRaw('t.status = "'.$request->status.'"');
        }
        $query->groupBy('detail_transaction.product_id');
        $model = $query->get();
        //dd($model);

        $datax = "";
        foreach ($model as $row){
            $datax.= '{ label: "'.$row->name.'",  data: '.$row->total.', color: \'#'.$this->getColor().'\'},';
        }

        return view('backend.grafik.result_all',[
            'model'=>$model,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'datax'=>$datax
        ]);
    }

    public function local()
    {
        return view('backend.grafik.form_local');
    }
    public function result_local(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required|numeric'
        ]);
        $start_date = date('Y/m/d', strtotime($request->start_date));
        $end_date = date('Y/m/d', strtotime($request->end_date));

        $query = TransactionDetail::select(\DB::raw('sum(detail_transaction.qty) AS total, p.name, p.type, t.status, t.id as transaction, t.created_at'))
            ->join('product AS p','p.id','=','detail_transaction.product_id')
            ->join('transaction AS t','t.id','=','detail_transaction.transaction_id')
            ->whereRaw('t.created_at >= "'.$start_date.'"')
            ->whereRaw('t.created_at <= "'.$end_date.'"')
            ->whereRaw('p.type = "1"');
        if($request->status != '6'){
            $query->whereRaw('t.status = "'.$request->status.'"');
        }
        $query->groupBy('detail_transaction.product_id');
        $model = $query->get();
        //dd($model);

        $datax = "";
        foreach ($model as $row){
            $datax.= '{ label: "'.$row->name.'",  data: '.$row->total.', color: \'#'.$this->getColor().'\'},';
        }

        return view('backend.grafik.result_all',[
            'model'=>$model,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'datax'=>$datax
        ]);
    }

    public function impor()
    {
        return view('backend.grafik.form_impor');
    }
    public function result_impor(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required|numeric'
        ]);
        $start_date = date('Y/m/d', strtotime($request->start_date));
        $end_date = date('Y/m/d', strtotime($request->end_date));

        $query = TransactionDetail::select(\DB::raw('sum(detail_transaction.qty) AS total, p.name, p.type, t.status, t.id as transaction, t.created_at'))
            ->join('product AS p','p.id','=','detail_transaction.product_id')
            ->join('transaction AS t','t.id','=','detail_transaction.transaction_id')
            ->whereRaw('t.created_at >= "'.$start_date.'"')
            ->whereRaw('t.created_at <= "'.$end_date.'"')
            ->whereRaw('p.type = "2"');
        if($request->status != '6'){
            $query->whereRaw('t.status = "'.$request->status.'"');
        }
        $query->groupBy('detail_transaction.product_id');
        $model = $query->get();
        //dd($model);

        $datax = "";
        foreach ($model as $row){
            $datax.= '{ label: "'.$row->name.'",  data: '.$row->total.', color: \'#'.$this->getColor().'\'},';
        }

        return view('backend.grafik.result_all',[
            'model'=>$model,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'datax'=>$datax
        ]);
    }

    private function getColor()
    {
        $color = dechex(rand(0x000000, 0xFFFFFF));
        return $color;
    }
}
