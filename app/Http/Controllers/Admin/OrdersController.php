<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\OrdersModel;
use App\Models\Admin\SalesModel;
use App\Models\Admin\CustomersModel;
use App\Models\Admin\CustomerDebtsModel;
use App\Models\Admin\CustomerPaymentsModel;
use App\Models\Admin\CustomerSalesModel;
use App\Models\Admin\ProductsModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $orders = OrdersModel::where("status","!=","0")->orderBy('id','ASC')->get();
        $products = ProductsModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.orders.order-list',compact([['settings'],['orders'],['products']]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = SettingsModel::findOrFail(1);
        $order = OrdersModel::findOrFail($id);
        $products = ProductsModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.orders.order-update',compact([['order'],['products'],['settings']]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = OrdersModel::findOrFail($id);
        $product = ProductsModel::findOrFail($order['productId']);
        if(isset($request->orderUpdate)){
            $order['note'] = $request['note'];
            $order->lastDate = date('Y-m-d H:i:s');
            $order->lastAdminId = Auth::id();
            $update = $order->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$order['name']." arranged your order";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
            
            return redirect()->route('admin.order.edit',[
                'update' => $update,
                $order->id => $order->id
            ]);
        }elseif(isset($request->orderDeliver)){
            $order->status = "1";
            $order['note'] = $request['note'];
            $order->lastDate = date('Y-m-d H:i:s');
            $order->lastAdminId = Auth::id();
            $update = $order->save();

            $product['stock'] = ($product['stock']-1);
            $productUpdate = $product->save();

            $sale = new SalesModel;
            $sale['status'] = "1";
            $sale['productId'] = $order['productId'];
            $sale['productName'] = $product['title'.__('lang.lang_db')];
            $sale['price'] = $product['price'];
            $sale['discount'] = $product['discount'];
            $sale['discountedPrice'] = $product['discountedPrice'];
            $sale['finalPrice'] = $product['finalPrice'];
            $sale['currency'] = $product['currency'];
            $sale['payment'] = $product['finalPrice'];
            $sale['debt'] = ($sale['finalPrice'] - $sale['payment']);
            $sale['saleDate'] = date('Y-m-d H:i:s');
            $sale['note'] = "Siparişten Gelen Satış Olarak Eklendi.";
            $sale->lastDate = date('Y-m-d H:i:s');
            $sale->lastAdminId = Auth::id();
            $add = $sale->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$order['name']." arranged the order as delivered. The order has been added to the sales list";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
            
            return redirect()->route('admin.order.edit',[
                'update' => $update,
                $order->id => $order->id
            ]);
        }elseif(isset($request->saleDelete)){
            $order->status = "0";
            $order->lastDate = date('Y-m-d H:i:s');
            $order->lastAdminId = Auth::id();
            $delete = $order->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$order['name']." deleted your order";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
            return redirect()->route('admin.order.index',[
                'delete' => $delete,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
