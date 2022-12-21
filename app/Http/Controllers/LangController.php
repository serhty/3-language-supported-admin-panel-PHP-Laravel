<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LangController extends Controller
{
    public function changeLang($locale){
        if(!empty($locale)){
            if($locale=="en"){
                Session::put('locale','en');
            }elseif($locale=="de"){
                Session::put('locale','de');
            }elseif($locale=="ru"){
                Session::put('locale','ru');
            }
        }else{
            Session::put('locale','en');
        }
        return redirect()->route('home');
    }
	
    public function changeLang_admin($locale){
        if(!empty($locale)){
            if($locale=="en"){
                Session::put('locale','en');
            }elseif($locale=="de"){
                Session::put('locale','de');
            }elseif($locale=="ru"){
                Session::put('locale','ru');
            }
        }else{
            Session::put('locale','en');
        }
        return back();
    }
}
