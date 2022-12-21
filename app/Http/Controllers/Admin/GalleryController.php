<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\GalleryImagesModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $galleryImages = GalleryImagesModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.gallery.gallery',compact([['galleryImages'],['settings']]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = SettingsModel::findOrFail(1);
        $galleryImages = GalleryImagesModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.gallery.gallery',compact([['galleryImages'],['settings']]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            foreach($request->image as $image){
                $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                $imageName = substr(str_shuffle($str), 0, 10).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images'),$imageName);
                $galleryImage = new GalleryImagesModel;
                $galleryImage['status'] = "1";
                $galleryImage['image'] = $imageName;
                $galleryImage->lastDate = date('Y-m-d H:i:s');
                $galleryImage->lastAdminId = Auth::id();
                $addImage = $galleryImage->save();
            }
        }

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.",added gallery image";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        $galleryImages = GalleryImagesModel::where("status","=","1")->orderBy('id','ASC')->get();
        return redirect()->route('admin.gallery.edit',[
            'add' => $add,
            $id => "1"
        ])->with(compact([['galleryImages']]));
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
        $galleryImages = GalleryImagesModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.gallery.gallery',compact([['galleryImages'],['settings']]));
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
        if(isset($request->galleryUpdate)){
            if($request->hasFile('image')){
                foreach($request->image as $image){
                    $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                    $imageName = substr(str_shuffle($str), 0, 10).'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('images'),$imageName);
                    $galleryImage = new GalleryImagesModel;
                    $galleryImage['status'] = "1";
                    $galleryImage['image'] = $imageName;
                    $galleryImage->lastDate = date('Y-m-d H:i:s');
                    $galleryImage->lastAdminId = Auth::id();
                    $addImage = $galleryImage->save();
                }
            }
            $update = "update";
            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", added gallery image";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            $galleryImages = galleryImagesModel::where([["status","=","1"]])->orderBy('id','ASC')->get();
            return redirect()->route('admin.gallery.edit',[
                'update' => $update,
                $id => "1"
            ])->with(compact([['galleryImages']]));
        }

        if(isset($request->deleteImage)){
            $deleteImageId = $_POST['deleteImage'];
            $deleteImage = galleryImagesModel::findOrFail($deleteImageId);
            $deleteImage->status = "0";
            $deleteImage->lastDate = date('Y-m-d H:i:s');
            $deleteImage->lastAdminId = Auth::id();
            $update = $deleteImage->save();
            $galleryImages = galleryImagesModel::where([["status","=","1"]])->orderBy('id','ASC')->get();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", gallery deleted image";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.gallery.edit',[
                'update' => $update,
                $id => "1"
            ])->with(compact([['galleryImages']]));
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
