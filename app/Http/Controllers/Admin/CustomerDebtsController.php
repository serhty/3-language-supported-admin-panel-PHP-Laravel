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

class CustomerDebtsController extends Controller
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

    public function debt($id)
    {
        $settings = SettingsModel::findOrFail(1);
        $customer = CustomersModel::findOrFail($id);
        return view('admin.customers.debt-add',compact([['customer'],['settings']]));
    }

    public function debtAdd(Request $request, $id)
    {
        $customer = CustomersModel::findOrFail($id);
        $debt = new CustomerDebtsModel;
        $debt['status'] = "1";
        $debt['customerId'] = $request['customer'];
        $debt['debt'] = str_replace(",",".",$request->debt);
        $debt['currency'] = $request['currency'];
        $debt['debtDate'] = date('Y-m-d H:i:s');
        $debt['note'] = $request['note'];
        $debt->lastDate = date('Y-m-d H:i:s');
        $debt->lastAdminId = Auth::id();
        $add = $debt->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.", ".$customer['name']." added customer debt in the name";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        return redirect()->route('admin.customer.edit',[
            'add' => $add,
            $customer->id => $customer->id
        ]);
    }

    public function debtDelete(Request $request, $id, $customerId)
    {
        $customer = CustomersModel::findOrFail($customerId);
        $debt = CustomerDebtsModel::findOrFail($id);
        $debt['status'] = "0";
        $debt->lastDate = date('Y-m-d H:i:s');
        $debt->lastAdminId = Auth::id();
        $delete = $debt->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.", ".$customer['name']." The customer has written off the debt";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        return redirect()->route('admin.customer.edit',[
            'delete' => $delete,
            $customer->id => $customer->id
        ]);
    }
}
