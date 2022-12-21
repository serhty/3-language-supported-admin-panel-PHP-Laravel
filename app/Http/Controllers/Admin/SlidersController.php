<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SlidersModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $sliders = SlidersModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.sliders.slider-list',compact([['sliders'],['settings']]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = SettingsModel::findOrFail(1);
        return view('admin.sliders.slider-add',compact([['settings']]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new SlidersModel;
        $slider['status'] = "1";
        $slider['title_de'] = $request['title'.__('lang.lang_db')];
        $slider['title_en'] = $request['title'.__('lang.lang_db')];
        $slider['title_ru'] = $request['title'.__('lang.lang_db')];
        $slider['link'.__('lang.lang_db')] = $request['link'.__('lang.lang_db')];
        $slider['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
        $slider->lastDate = date('Y-m-d H:i:s');
        $slider->lastAdminId = Auth::id();
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:5120'
        ]);
        if($request->hasFile('image')){
            $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
            $imageName = substr(str_shuffle($str), 0, 10).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'),$imageName);
            $slider->image = $imageName;
        }

        $add = $slider->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." added a slide";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();
        
        return redirect()->route('admin.slider.edit',[
            'add' => $add,
            $slider->id => $slider->id
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
        $slider = SlidersModel::findOrFail($id);
        return view('admin.sliders.slider-update',compact([['slider'],['settings']]));
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
        $slider = SlidersModel::findOrFail($id);
        if(isset($request->sliderUpdate)){
            $slider['title'.__('lang.lang_db')] = $request['title'.__('lang.lang_db')];
            $slider['link'.__('lang.lang_db')] = $request['link'.__('lang.lang_db')];
            $slider['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
            $slider->lastDate = date('Y-m-d H:i:s');
            $slider->lastAdminId = Auth::id();
            if($request->hasFile('image')){
                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg|max:5120'
                ]);
                $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                $imageName = substr(str_shuffle($str), 0, 10).'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'),$imageName);
                $slider->image = $imageName;
            }
            $update = $slider->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$slider['title'.__('lang.lang_db')]." arranged the slide";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
            
            return redirect()->route('admin.slider.edit',[
                'update' => $update,
                $slider->id => $slider->id
            ]);
        }elseif(isset($request->sliderDelete)){
            $slider->status = "0";
            $slider->lastDate = date('Y-m-d H:i:s');
            $slider->lastAdminId = Auth::id();
            $delete = $slider->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$slider['title'.__('lang.lang_db')]." slide wiped";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
            return redirect()->route('admin.slider.index',[
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
