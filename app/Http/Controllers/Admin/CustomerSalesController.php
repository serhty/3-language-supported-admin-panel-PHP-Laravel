<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CustomersModel;
use App\Models\Admin\CustomerDebtsModel;
use App\Models\Admin\CustomerPaymentsModel;
use App\Models\Admin\CustomerSalesModel;
use App\Models\Admin\SalesModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\ProductsModel;
use App\Models\Admin\SettingsModel;

class CustomerSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
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

    public function sale($id)
    {
        $settings = SettingsModel::findOrFail(1);
        $customer = CustomersModel::findOrFail($id);
        $products = ProductsModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.customers.sale-add',compact([['customer'],['products'],['settings']]));
    }

    public function saleAdd(Request $request, $id)
    {
        $customer = CustomersModel::findOrFail($id);
        $sale = new CustomerSalesModel;
        $sale['status'] = "1";
        $sale['customerId'] = $request['customer'];
        $sale['payment'] = str_replace(",",".",$request['payment']);
        if(!empty($request['productName'])){
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
        }else{
            $product = ProductsModel::findOrFail($request['product']);
            $sale['productId'] = $request['product'];
            $sale['productName'] = $product['title'.__('lang.lang_db')];
            $sale['price'] = $product['price'];
            $sale['discount'] = $product['discount'];
            $sale['discountedPrice'] = $product['discountedPrice'];
            $sale['finalPrice'] = $product['finalPrice'];
            $sale['currency'] = $product['currency'];
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
        $transaction->transaction = Auth::user()->username.", ".$customer['name']." customer named ".$sale['productName']." added product sale";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        if($sale['payment'] != "" or $sale['payment'] != "0.00"){
            $customerpayment = new CustomerPaymentsModel;
            $customerpayment['status'] = "1";
            $customerpayment['customerId'] = $sale['customerId'];
            $customerpayment['payment'] = $sale['payment'];
            $customerpayment['title'] = $sale['productName']." ürün satışından dolayı eklendi";
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

        $customersale = new SalesModel;
        $customersale['status'] = "1";
        if(!empty($request['productName'])){
            $customersale['productId'] = null;
            $customersale['productName'] = $request['productName'];
        }else{
            $product = ProductsModel::findOrFail($request['product']);
            $customersale['productId'] = $request['product'];
            $customersale['productName'] = $product['title'.__('lang.lang_db')];
        }
        $customersale['customerId'] = $sale['customerId'];
        $customersale['saleDate'] = date('Y-m-d H:i:s');
        $customersale['price'] = $sale['price'];
        $customersale['discount'] = $sale['discount'];
        $customersale['discountedPrice'] = $sale['discountedPrice'];
        $customersale['finalPrice'] = $sale['finalPrice'];
        $customersale['currency'] = $sale['currency'];
        $customersale['payment'] = $sale['payment'];
        $customersale['debt'] = $sale['debt'];
        $customersale->lastDate = date('Y-m-d H:i:s');
        $customersale->lastAdminId = Auth::id();
        $add = $customersale->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.", ".$sale['productName']." Added sale due to product sale";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();



        return redirect()->route('admin.customer.edit',[
            'add' => $add,
            $customer->id => $customer->id
        ]);
    }

    public function saleDelete(Request $request, $id, $customerId)
    {
        $customer = CustomersModel::findOrFail($customerId);
        $sale = CustomerSalesModel::findOrFail($id);
        $sale['status'] = "0";
        $sale->lastDate = date('Y-m-d H:i:s');
        $sale->lastAdminId = Auth::id();
        $delete = $sale->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.", ".$customer['name']." customer named deleted the sale";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        return redirect()->route('admin.customer.edit',[
            'delete' => $delete,
            $customer->id => $customer->id
        ]);
    }
}
