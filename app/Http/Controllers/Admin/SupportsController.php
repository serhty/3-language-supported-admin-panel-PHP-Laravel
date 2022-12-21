<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SupportsModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class SupportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $supports = SupportsModel::where("status","!=","0")->orderBy('id','ASC')->get();
        return view('admin.supports.support-list',compact([['supports'],['settings']]));
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
        $support = SupportsModel::findOrFail($id);
        return view('admin.supports.support-update',compact([['support'],['settings']]));
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
        $support = SupportsModel::findOrFail($id);
        if(isset($request->supportUpdate)){
            $support->note = $request->note;
            $support->lastDate = date('Y-m-d H:i:s');
            $support->lastAdminId = Auth::id();
            $update = $support->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", edited support message";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.support.edit',[
                'update' => $update,
                $support->id => $support->id
            ]);
        }elseif(isset($request->supportDelete)){
            $support->status = "0";
            $support->lastDate = date('Y-m-d H:i:s');
            $support->lastAdminId = Auth::id();
            $delete = $support->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", support message deleted";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.support.index',[
                'delete' => $delete,
            ]);
        }elseif(isset($request->supportReply)){
            $support->status = "1";
            $support->lastDate = date('Y-m-d H:i:s');
            $support->lastAdminId = Auth::id();
            $support->note = $request->note;
            $support->replyDate = date('Y-m-d H:i:s');
            $update = $support->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", support message edited as answered";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.support.edit',[
                'update' => $update,
                $support->id => $support->id
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
