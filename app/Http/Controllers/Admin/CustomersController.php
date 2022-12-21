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

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $customers = CustomersModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.customers.customer-list',compact([['customers'],['settings']]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = SettingsModel::findOrFail(1);
        return view('admin.customers.customer-add',compact([['settings']]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new CustomersModel;
        $customer['status'] = "1";
        $customer['name'] = $request['name'];
        $customer['phone'] = $request['phone'];
        $customer['mail'] = $request['mail'];
        $customer['note'] = $request['note'];
        $customer->lastDate = date('Y-m-d H:i:s');
        $customer->lastAdminId = Auth::id();
        $add = $customer->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.", ".$request['name']." added customer named";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();
        
        return redirect()->route('admin.customer.edit',[
            'add' => $add,
            $customer->id => $customer->id
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
        $customer = CustomersModel::findOrFail($id);
        $debts = CustomerDebtsModel::where("status","=","1")->where("customerId","=",$id)->orderBy('id','ASC')->get();
        $payments = CustomerPaymentsModel::where("status","=","1")->where("customerId","=",$id)->orderBy('id','ASC')->get();
        $sales = CustomerSalesModel::where("status","=","1")->where("customerId","=",$id)->orderBy('id','ASC')->get();
        return view('admin.customers.customer-update',compact([['customer'],['debts'],['payments'],['sales'],['settings']]));
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
        $customer = CustomersModel::findOrFail($id);
        if(isset($request->customerUpdate)){
            $customer['name'] = $request['name'];
            $customer['phone'] = $request['phone'];
            $customer['mail'] = $request['mail'];
            $customer['note'] = $request['note'];
            $customer->lastDate = date('Y-m-d H:i:s');
            $customer->lastAdminId = Auth::id();
            $update = $customer->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['name']." held customer named";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
            
            return redirect()->route('admin.customer.edit',[
                'update' => $update,
                $customer->id => $customer->id
            ]);
        }elseif(isset($request->customerDelete)){
            $customer->status = "0";
            $customer->lastDate = date('Y-m-d H:i:s');
            $customer->lastAdminId = Auth::id();
            $delete = $customer->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['name']." deleted customer named";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
            return redirect()->route('admin.customer.index',[
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
