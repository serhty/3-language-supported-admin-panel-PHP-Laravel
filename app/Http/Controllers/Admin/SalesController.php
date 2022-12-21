<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $sales = SalesModel::where("status","=","1")->orderBy('id','ASC')->get();
        $customers = CustomersModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.sales.sale-list',compact([['sales'],['customers'],['settings']]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = SettingsModel::findOrFail(1);
        $products = ProductsModel::where("status","=","1")->orderBy('id','ASC')->get();
        $customers = CustomersModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.sales.sale-add')->with(compact([['products'],['customers'],['settings']]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = new SalesModel;
        $sale['status'] = "1";
        if(empty($request['customer'])){
            $customer = new CustomersModel;
            $customer['status'] = "1";
            $customer['name'] = $request['customerName'];
            $customer->lastDate = date('Y-m-d H:i:s');
            $customer->lastAdminId = Auth::id();
            $add = $customer->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$customer['name']." customer named added during sale";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            $sale['customerId'] = $customer['id'];
        }else{
            $sale['customerId'] = $request['customer'];
        }
        $sale['payment'] = str_replace(",",".",$request['payment']);
        if(!empty($request['product'])){
            $product = ProductsModel::findOrFail($request['product']);
            if(isset($product['stock'])){
                $product['stock'] = ($product['stock']-1);
                $productUpdate = $product->save();
            }
            $sale['productId'] = $request['product'];
            $sale['productName'] = $product['title'.__('lang.lang_db')];
            $sale['price'] = $product['price'];
            $sale['discount'] = $product['discount'];
            $sale['discountedPrice'] = $product['discountedPrice'];
            $sale['finalPrice'] = $product['finalPrice'];
            $sale['currency'] = $product['currency'];
            $sale['debt'] = ($sale['finalPrice'] - $sale['payment']);
        }else{
            $sale['productId'] = null;
            $sale['productName'] = $request['productName'];
            $sale['price'] = $request['price'];
            if(!empty($request['discount'])){
                $sale['discount'] = $request['discount'];
                $sale['discountedPrice'] = ($request['price'] - (($request['price']*$request["discount"])/100));
                $sale['finalPrice'] = $sale['discountedPrice'];
            }else{
                $sale['finalPrice'] = $sale['price'];
            }
            $sale['currency'] = $request['currency'];
            $sale['debt'] = ($sale['finalPrice'] - $sale['payment']);
        }
        $sale['saleDate'] = date('Y-m-d H:i:s');
        $sale['note'] = $request['note'];
        $sale->lastDate = date('Y-m-d H:i:s');
        $sale->lastAdminId = Auth::id();
        $add = $sale->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.", ".$sale['productName']." added product sale";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        $customersale = new CustomerSalesModel;
        $customersale['status'] = "1";
        $customersale['customerId'] = $sale['customerId'];
        $customersale['productId'] = $sale['productId'];
        $customersale['productName'] = $sale['productName'];
        $customersale['price'] = $sale['price'];
        $customersale['payment'] = $sale['payment'];
        $customersale['debt'] = $sale['debt'];
        $customersale['currency'] = $sale['currency'];
        $customersale['saleDate'] = date('Y-m-d H:i:s');
        $customersale['note'] = $sale['note'];
        $customersale->lastDate = date('Y-m-d H:i:s');
        $customersale->lastAdminId = Auth::id();
        $add = $customersale->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.", ".$sale['productName']." added customer sales due to product sales";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        if($sale['payment'] != "" or $sale['payment'] != "0.00"){
            $customerpayment = new CustomerPaymentsModel;
            $customerpayment['status'] = "1";
            $customerpayment['customerId'] = $sale['customerId'];
            $customerpayment['payment'] = $sale['payment'];
            $customerpayment['title'] = $sale['productName']." added due to product sale";
            $customerpayment['currency'] = $sale['currency'];
            $customerpayment['paymentDate'] = date('Y-m-d H:i:s');
            $customerpayment['note'] = $sale['note'];
            $customerpayment->lastDate = date('Y-m-d H:i:s');
            $customerpayment->lastAdminId = Auth::id();
            $add = $customerpayment->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$sale['productName']." added customer payment due to product sale";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
        }

        if($sale['debt'] != "" or $sale['debt'] != "0.00"){
            $customerdebt = new CustomerDebtsModel;
            $customerdebt['status'] = "1";
            $customerdebt['customerId'] = $sale['customerId'];
            $customerdebt['debt'] = $sale['debt'];
            $customerdebt['title'] = $sale['productName']." added due to product sale";
            $customerdebt['currency'] = $sale['currency'];
            $customerdebt['debtDate'] = date('Y-m-d H:i:s');
            $customerdebt['note'] = $sale['note'];
            $customerdebt->lastDate = date('Y-m-d H:i:s');
            $customerdebt->lastAdminId = Auth::id();
            $add = $customerdebt->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$sale['productName']." added customer debt due to product sale";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
        }

        return redirect()->route('admin.selling.edit',[
            'add' => $add,
            $sale->id => $sale->id
        ]);
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
        $sale = SalesModel::findOrFail($id);
        $products = ProductsModel::where("status","=","1")->orderBy('id','ASC')->get();
        $customers = CustomersModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.sales.sale-update',compact([['sale'],['products'],['customers'],['settings']]));
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
        $sale = SalesModel::findOrFail($id);
        if(isset($request->saleUpdate)){
            $sale['note'] = $request['note'];
            $sale->lastDate = date('Y-m-d H:i:s');
            $sale->lastAdminId = Auth::id();
            $update = $sale->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", held the sale";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
            
            return redirect()->route('admin.selling.edit',[
                'update' => $update,
                $sale->id => $sale->id
            ]);
        }elseif(isset($request->saleDelete)){
            $sale->status = "0";
            $sale->lastDate = date('Y-m-d H:i:s');
            $sale->lastAdminId = Auth::id();
            $delete = $sale->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", sale wiped out";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
            return redirect()->route('admin.selling.index',[
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
