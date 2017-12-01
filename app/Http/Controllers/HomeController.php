<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Subscribe;
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

    public function search(Request $request)
    {
        return $request->keyword;
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
        return redirect()->route('member.invoice',$model->id);

    }

    public function invoice($id)
    {
        $transaction = Transaction::find($id);
        return view('frontend.invoice',['transaction'=>$transaction]);
    }

    public function payment($id)
    {
        $model = Transaction::find($id);

        return view('member.payment',['model'=>$model]);
    }

    public function payment_proses(Request $request,$id)
    {
        $transaction = Transaction::findOrFail($id);
        $path = base_path('assets/img/payment/');
        $file = \Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
        $model = new Payment();
        $model->transaction_id = $id;
        $model->image = $file->basename;
        $model->status = Payment::NOT_VERIFIED;
        $model->save();
        $transaction->status = Transaction::WAITING_VERIFIED;
        $transaction->save();
        return redirect()->route('member.order_history');
    }

    public function subscribe(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'news_email' => 'required|unique:subscribe,email'
        ]);
        if ($validator->fails()) {
            return '0';
        }
        $model = new Subscribe();
        $model->email = $request->news_email;
        $model->save();
        return '1';
    }

    public function order_history()
    {
        $model = Transaction::where('member_id',\Auth::user()->id)->get();

        return view('member.order_history', ['model'=>$model]);
    }

    public function profile()
    {
        $model = \Auth::user();
        return view('member.profile',['model'=>$model]);
    }

    public function save_profile(Request $request)
    {
        $user = \Auth::user();
        $filter = [
            'name' => 'required|max:255',
            'phone' => 'required',
            'address' => 'required'
        ];

        if($request->email === $user->email){
            $filter['email'] = 'required|string|email|max:255';
        }else{
            $filter['email'] = 'required|string|email|max:255|unique:users';
        }

        if($request->password != null){
            $filter['password'] = 'required|string|min:6|confirmed';
            $user->password = bcrypt($request->password);
        }

        $validator = \Validator::make($request->all(),$filter);

        if ($validator->fails()) {
            return redirect()
                ->route('member.profile')
                ->withErrors($validator)
                ->withInput();
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('member.profile')->with('success', 'Update member!');
    }
}
