<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\LoginModel;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\AdminsModel;
use App\Models\Admin\LatestTransactionsModel;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function login_check(Request $request)
    {
        if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
            $admin = AdminsModel::findOrFail(Auth::id());
            $admin->lastLogin = date('Y-m-d H:i:s');
            $adminUpdate = $admin->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username." logged into the system";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.home');
        }else{
            return view('login-failed-admin');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
