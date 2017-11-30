<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function detail_product($id)
    {
        $model = Product::find($id);
        return view('frontend.detail_product',['model'=>$model]);
    }

    //Cart
    public function cart_manage()
    {
        return view('frontend.cart');
    }
    public function cart_insert(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $price = $product->price;
        if($product->discount>0){
            $price = $product->price-($product->price*$product->discount/100);
        }
        \Cart::instance('cart')->add($product->id, $product->name, $request->qty, $price)->associate('App\Models\Product');
        return response()->json([
            'status' => '1'
        ]);
    }

    public function cart_update(Request $request)
    {
        \Cart::instance('cart')->update($request->rowId, $request->qty);
    }

    public function cart_delete(Request $request)
    {
        $rowId = $request->rowId;
        \Cart::instance('cart')->remove($rowId);
        //return redirect()->back();
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function checkout_billing(Request $request)
    {
        session(['billing' => $request->all()]);
        return redirect()->route('frontend.checkout.shipping');
    }

    public function shipping()
    {
        return view('frontend.shipping');
    }

    public function shipping_proses(Request $request)
    {
        $model = \App\Models\Setting::find($request->shipping_address);
        session(['shipping' => ['id'=>$model->id,'type'=>$model->type,'value'=>$model->value]]);
        return redirect()->route('frontend.checkout.order_review');
    }

    public function order_review()
    {
         return view('frontend.order_review');   
    }

    public function order_proses(Request $request)
    {
        $billing = session('billing');
        $shipping = session('shipping');

        $model = new Transaction();
        $cart = \Cart::instance('cart');

        $model->id = $model->createId();
        $model->member_id = \Auth::user()->id;
        $model->fullname = $billing['name'];
        $model->phone = $billing['phone'];
        $model->address = $billing['address'];
        $model->sub_total = $cart->total(0,'','');
        $berat = 0;
        foreach ($cart->content() as $row)
        {
            $berat+=($row->model->berat*$row->qty);
        }
        $model->shipping = $berat*$shipping['value'];
        $model->total = $model->shipping+$model->sub_total;
        $model->status = Transaction::NEW_ORDER;
        $model->shipping_type = $shipping['type'];
        $model->save();
        foreach ($cart->content() as $row)
        {
            $detail = new TransactionDetail();
            $detail->transaction_id = $model->id;
            $detail->product_id = $row->id;
            $detail->qty = $row->qty;
            $detail->price = $row->price;
            $detail->total = $row->qty*$row->price;
            $detail->save();

            $product = Product::find($row->id);
            $product->stock = $product->stock - $row->qty;
            $product->save();
        }
        $cart->destroy();
        //return redirect()->route('frontend.invoice',base64_encode($model->id));
        return redirect()->route('home');

    }

    public function invoice($id)
    {
        $transaction = Transaction::find($id);
        return view('frontend.invoice',['transaction'=>$transaction]);
    }

    public function payment($id)
    {

    }

    public function subscribe(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'phone' => 'required|max:12|unique:subscribe'
        ]);
        if ($validator->fails()) {
            return '0';
        }
        $model = new Subscribe();
        $model->phone = $request->phone;
        $model->save();
        return '1';
    }
}
