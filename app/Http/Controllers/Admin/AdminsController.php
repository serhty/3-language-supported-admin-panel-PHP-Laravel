<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AdminsModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $admins = AdminsModel::where("status","!=","0")->orderBy('id','ASC')->get();
        return view('admin.admins.admin-list',compact([['admins'],['settings']]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = SettingsModel::findOrFail(1);
        return view('admin.admins.admin-add',compact([['settings']]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new AdminsModel;
        $admin->status = $request->status;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->lastDate = date('Y-m-d H:i:s');
        $admin->lastAdminId = Auth::id();
        $add = $admin->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.", ".$admin->username." added user to my site";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        return redirect()->route('admin.admin.edit',[
            'add' => $add,
            $admin->id => $admin->id
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
        $admin = AdminsModel::findOrFail($id);
        return view('admin.admins.admin-update',compact([['admin'],['settings']]));
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
        if(isset($request->adminUpdate)){
            $admin = AdminsModel::findOrFail($id);
            if(empty($request->password)){
                $admin->username = $request->username;
                $admin->status = $request->status;
                $admin->lastDate = date('Y-m-d H:i:s');
                $admin->lastAdminId = Auth::id();
            }else{
                $admin->username = $request->username;
                $admin->password = Hash::make($request->password);
                $admin->status = $request->status;
                $admin->lastDate = date('Y-m-d H:i:s');
                $admin->lastAdminId = Auth::id();
            }
            $update = $admin->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$admin->username." edited user";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.admin.edit',[
                'update' => $update,
                $admin->id => $admin->id
            ]);
        }elseif(isset($request->adminDelete)){
            $admin = AdminsModel::findOrFail($id);
            $admin->status = "0";
            $admin->lastDate = date('Y-m-d H:i:s');
            $admin->lastAdminId = Auth::id();
            $delete = $admin->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$admin->username." deleted the user";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.admin.index',[
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
