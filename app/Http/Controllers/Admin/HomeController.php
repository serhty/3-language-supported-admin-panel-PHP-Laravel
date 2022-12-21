<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\AdminsModel;
use App\Models\Admin\SettingsModel;
use App\Models\Admin\ProductsModel;
use App\Models\Admin\CustomersModel;
use App\Models\Admin\CategoriesModel;
use App\Models\Admin\PagesModel;
use App\Models\Admin\SalesModel;
use App\Models\Admin\SlidersModel;
use App\Models\Admin\SupportsModel;
use App\Models\Admin\NotesModel;
use App\Models\Admin\OrdersModel;

class HomeController extends Controller
{
    public function index()
    {
        $admins = AdminsModel::where("status","=","1")->orderBy('id','ASC')->get();
        $settings = SettingsModel::findOrFail(1);
        $products = ProductsModel::where([["status","=","1"]])->orderBy('id','ASC')->get();
        $customers = CustomersModel::where([["status","=","1"]])->orderBy('id','ASC')->get();
        $categories = CategoriesModel::where([["status","=","1"]])->orderBy('id','ASC')->get();
        $pages = PagesModel::where([["status","=","1"]])->orderBy('id','ASC')->get();
        $sales = SalesModel::where([["status","=","1"]])->orderBy('id','ASC')->get();
        $sliders = SlidersModel::where([["status","=","1"]])->orderBy('id','ASC')->get();
        $supports = SupportsModel::where([["status","=","2"]])->orderBy('id','ASC')->get();
        $notes = NotesModel::where([["status","=","2"]])->orderBy('id','ASC')->get();
        $orders = OrdersModel::where([["status","=","2"]])->orderBy('id','ASC')->get();
        return view('admin.home',compact([['admins'],['settings'],['products'],['customers'],['categories'],['pages'],['sales'],['sliders'],['supports'],['notes'],['orders']]));
    }
}
