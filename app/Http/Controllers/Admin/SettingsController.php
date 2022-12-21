<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SettingsModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;

class SettingsController extends Controller
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
        $settings = SettingsModel::findOrFail($id);
        return view('admin.settings',compact([['settings']]));
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
        $settings = SettingsModel::findOrFail($id);
        $settings['url'.__('lang.lang_db')] = $request['url'.__('lang.lang_db')];
        $settings['title'.__('lang.lang_db')] = $request['title'.__('lang.lang_db')];
        $settings['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
        $settings['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
        if($request->hasFile('logo')){
            $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
            $imageName = 'logo.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('images'),$imageName);
            $settings->logo = $imageName;
        }
        $settings['lang_de'] = $request['lang_de'];
        $settings['lang_en'] = $request['lang_en'];
        $settings['lang_ru'] = $request['lang_ru'];
        $settings->lastDate = $request->lastDate;
        $settings->lastAdminId = $request->lastAdminId;
        $update = $settings->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username." settings updated";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        return redirect()->route('admin.settings.edit',[
            'update' => $update,
            $id => 1
        ]);
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
