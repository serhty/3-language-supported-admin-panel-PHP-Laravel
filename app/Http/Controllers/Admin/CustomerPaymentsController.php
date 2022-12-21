<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CustomersModel;
use App\Models\Admin\CustomerDebtsModel;
use App\Models\Admin\CustomerPaymentsModel;
use App\Models\Admin\CustomerSalesModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class CustomerPaymentsController extends Controller
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
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payment($id)
    {
        $settings = SettingsModel::findOrFail(1);
        $customer = CustomersModel::findOrFail($id);
        return view('admin.customers.payment-add',compact([['customer'],['settings']]));
    }

    public function paymentAdd(Request $request, $id)
    {
        $customer = CustomersModel::findOrFail($id);
        $payment = new CustomerPaymentsModel;
        $payment['status'] = "1";
        $payment['customerId'] = $request['customer'];
        $payment['payment'] = str_replace(",",".",$request->payment);
        $payment['currency'] = $request['currency'];
        $payment['paymentDate'] = date('Y-m-d H:i:s');
        $payment['note'] = $request['note'];
        $payment->lastDate = date('Y-m-d H:i:s');
        $payment->lastAdminId = Auth::id();
        $add = $payment->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.", ".$customer['name']." added customer payment named";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        return redirect()->route('admin.customer.edit',[
            'add' => $add,
            $customer->id => $customer->id
        ]);
    }

    public function paymentDelete(Request $request, $id, $customerId)
    {
        $customer = CustomersModel::findOrFail($customerId);
        $payment = CustomerPaymentsModel::findOrFail($id);
        $payment['status'] = "0";
        $payment->lastDate = date('Y-m-d H:i:s');
        $payment->lastAdminId = Auth::id();
        $delete = $payment->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.", ".$customer['name']." deleted customer payment in name";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        return redirect()->route('admin.customer.edit',[
            'delete' => $delete,
            $customer->id => $customer->id
        ]);
    }
}
