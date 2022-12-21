<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\HeaderMenuModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class HeaderMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $menus = HeaderMenuModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.headerMenus.menu-update',compact([['menus'],['settings']]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = SettingsModel::findOrFail(1);
        $menus = HeaderMenuModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.headerMenus.menu-update',compact([['menus'],['settings']]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menus = HeaderMenuModel::where("status","=","1")->orderBy('id','ASC')->get();
        $menu = HeaderMenuModel::where("status","=","1")->orderBy('id','ASC')->limit(1)->get();
        // $menu = $menu[0];
        $menuCheck = HeaderMenuModel::where([["status","=","1"],["title_de","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_en","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_ru","=",$request['title'.__('lang.lang_db')]]])->get();
        if(!empty($menuCheck[0])){
            return redirect()->route('admin.headerMenu.edit',[
                'check' => "check",
                $menu['id'] => $menu['id']
            ])->with(compact([['menus']]));
        }else{
            $menu = new HeaderMenuModel;
            $menu['status'] = "1";
            $menu['title_de'] = $request['title'.__('lang.lang_db')];
            $menu['title_en'] = $request['title'.__('lang.lang_db')];
            $menu['title_ru'] = $request['title'.__('lang.lang_db')];
            $menu['link'.__('lang.lang_db')] = $request['link'.__('lang.lang_db')];
            $menu['topMenu'] = $request["topMenu"];
            $menu['row'] = $request["row"];
            $menu->lastDate = date('Y-m-d H:i:s');
            $menu->lastAdminId = Auth::id();
            $add = $menu->save();
            
            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." Added a menu titled";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.headerMenu.edit',[
                'add' => $add,
                $menu['id'] => $menu['id']
            ])->with(compact([['menus']]));
        }
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
    public function edit()
    {
        $settings = SettingsModel::findOrFail(1);
        $menus = HeaderMenuModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.headerMenus.menu-update',compact([['menus'],['settings']]));
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
        $menus = HeaderMenuModel::where("status","=","1")->orderBy('id','ASC')->get();
        $menu = HeaderMenuModel::findOrFail($id);
        if(isset($request->menuUpdate)){
            $menuCheck = HeaderMenuModel::where([["status","=","1"],["title_de","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_en","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_ru","=",$request['title'.__('lang.lang_db')]]])->get();
            if(!empty($menuCheck[0])){
                $menu['link'.__('lang.lang_db')] = $request['link'.__('lang.lang_db')];
                $menu['topMenu'] = $request["topMenu"];
                $menu['row'] = $request["row"];
                $menu->lastDate = date('Y-m-d H:i:s');
                $menu->lastAdminId = Auth::id();
                $update = $menu->save();

                $transaction = new LatestTransactionsModel;
                $transaction->status = "1";
                $transaction->adminId = Auth::id();
                $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." edited the menu titled";
                $transaction->transactionDate = date('Y-m-d H:i:s');
                $transactionAdd = $transaction->save();

                return redirect()->route('admin.headerMenu.edit',[
                    'check' => "check",
                    $menu['id'] => $menu['id']
                ])->with(compact([['menus']]));
            }else{
                $menu['title'.__('lang.lang_db')] = $request['title'.__('lang.lang_db')];
                $menu['link'.__('lang.lang_db')] = $request['link'.__('lang.lang_db')];
                $menu['topMenu'] = $request["topMenu"];
                $menu['row'] = $request["row"];
                $menu->lastDate = date('Y-m-d H:i:s');
                $menu->lastAdminId = Auth::id();
                $update = $menu->save();

                $transaction = new LatestTransactionsModel;
                $transaction->status = "1";
                $transaction->adminId = Auth::id();
                $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." edited the menu titled";
                $transaction->transactionDate = date('Y-m-d H:i:s');
                $transactionAdd = $transaction->save();

                return redirect()->route('admin.headerMenu.edit',[
                    'update' => $update,
                    $menu['id'] => $menu['id']
                ])->with(compact([['menus']]));
            }
        }elseif(isset($request->menuDelete)){
            $menu->status = "0";
            $menu->lastDate = date('Y-m-d H:i:s');
            $menu->lastAdminId = Auth::id();
            $delete = $menu->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." deleted the titled menu";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.headerMenu.edit',[
                'delete' => $delete,
                $menu['id'] => $menu['id']
            ])->with(compact([['menus']]));
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
