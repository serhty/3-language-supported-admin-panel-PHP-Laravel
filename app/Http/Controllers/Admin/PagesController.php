<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\PagesModel;
use App\Models\Admin\PageImagesModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $pages = PagesModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.pages.page-list',compact([['pages'],['settings']]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = SettingsModel::findOrFail(1);
        return view('admin.pages.page-add',compact([['settings']]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pageCheck = PagesModel::where([["status","=","1"],["title_de","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_en","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_ru","=",$request['title'.__('lang.lang_db')]]])->get();
        if(!empty($pageCheck[0])){
            return redirect()->route('admin.page.create',[
                'check' => "check"
            ]);
        }else{
            $page = new PagesModel;
            $page['status'] = "1";
            $page['title_de'] = $request['title'.__('lang.lang_db')];
            $page['link_de'] = Str::slug($request['title'.__('lang.lang_db')]);
            $page['title_en'] = $request['title'.__('lang.lang_db')];
            $page['link_en'] = Str::slug($request['title'.__('lang.lang_db')]);
            $page['title_ru'] = $request['title'.__('lang.lang_db')];
            $page['link_ru'] = Str::slug($request['title'.__('lang.lang_db')]);
            $page['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
            $page['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
            $page['content'.__('lang.lang_db')] = $request['content'.__('lang.lang_db')];
            $page->lastDate = date('Y-m-d H:i:s');
            $page->lastAdminId = Auth::id();
            $add = $page->save();
            if($request->hasFile('image')){
                foreach($request->image as $image){
                    $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                    $imageName = substr(str_shuffle($str), 0, 10).'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('images'),$imageName);
                    $pageImage = new PageImagesModel;
                    $pageImage['status'] = "1";
                    $pageImage['pageId'] = $page['id'];
                    $pageImage['cover'] = "0";
                    $pageImage['image'] = $imageName;
                    $addImage = $pageImage->save();
                }
            }

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." added page titled";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            $pageImages = PageImagesModel::where([["status","=","1"],["pageId","=",$page['id']]])->orderBy('id','ASC')->get();
            return redirect()->route('admin.page.edit',[
                'add' => $add,
                $page['id'] => $page['id']
            ])->with(compact([['pageImages']]));
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
    public function edit($id)
    {
        $settings = SettingsModel::findOrFail(1);
        $page = PagesModel::findOrFail($id);
        $pageImages = PageImagesModel::where([["status","=","1"],["pageId","=",$id]])->orderBy('id','ASC')->get();
        return view('admin.pages.page-update',compact([['page'],['pageImages'],['settings']]));
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
        $page = PagesModel::findOrFail($id);
        if(isset($request->pageUpdate)){
            $pageCheck = PagesModel::where([["status","=","1"],["title_de","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_en","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_ru","=",$request['title'.__('lang.lang_db')]]])->get();
            if(!empty($pageCheck[0])){
                $page['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
                $page['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
                $page['content'.__('lang.lang_db')] = $request['content'.__('lang.lang_db')];
                $page->lastDate = date('Y-m-d H:i:s');
                $page->lastAdminId = Auth::id();
                $update = $page->save();
                if($request->hasFile('image')){
                    foreach($request->image as $image){
                        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                        $imageName = substr(str_shuffle($str), 0, 10).'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('images'),$imageName);
                        $pageImage = new PageImagesModel;
                        $pageImage['status'] = "1";
                        $pageImage['pageId'] = $page['id'];
                        $pageImage['cover'] = "0";
                        $pageImage['image'] = $imageName;
                        $addImage = $pageImage->save();
                    }
                }

                $transaction = new LatestTransactionsModel;
                $transaction->status = "1";
                $transaction->adminId = Auth::id();
                $transaction->transaction = Auth::user()->username.", ".$page['title'.__('lang.lang_db')]." edited his page";
                $transaction->transactionDate = date('Y-m-d H:i:s');
                $transactionAdd = $transaction->save();

                $pageImages = PageImagesModel::where([["status","=","1"],["pageId","=",$page['id']]])->orderBy('id','ASC')->get();
                return redirect()->route('admin.page.edit',[
                    'check' => "check",
                    $page['id'] => $page['id']
                ])->with(compact([['pageImages']]));
            }else{
                $page['title'.__('lang.lang_db')] = $request['title'.__('lang.lang_db')];
                $page['link'.__('lang.lang_db')] = Str::slug($request['title'.__('lang.lang_db')]);
                $page['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
                $page['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
                $page['content'.__('lang.lang_db')] = $request['content'.__('lang.lang_db')];
                $page->lastDate = date('Y-m-d H:i:s');
                $page->lastAdminId = Auth::id();
                $update = $page->save();
                if($request->hasFile('image')){
                    foreach($request->image as $image){
                        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                        $imageName = substr(str_shuffle($str), 0, 10).'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('images'),$imageName);
                        $pageImage = new PageImagesModel;
                        $pageImage['status'] = "1";
                        $pageImage['pageId'] = $page['id'];
                        $pageImage['cover'] = "0";
                        $pageImage['image'] = $imageName;
                        $addImage = $pageImage->save();
                    }
                }

                $transaction = new LatestTransactionsModel;
                $transaction->status = "1";
                $transaction->adminId = Auth::id();
                $transaction->transaction = Auth::user()->username.", ".$page['title'.__('lang.lang_db')]." edited his page";
                $transaction->transactionDate = date('Y-m-d H:i:s');
                $transactionAdd = $transaction->save();

                $pageImages = PageImagesModel::where([["status","=","1"],["pageId","=",$page['id']]])->orderBy('id','ASC')->get();
                return redirect()->route('admin.page.edit',[
                    'update' => $update,
                    $page['id'] => $page['id']
                ])->with(compact([['pageImages']]));
            }
        }elseif(isset($request->pageDelete)){
            $page->status = "0";
            $page->lastDate = date('Y-m-d H:i:s');
            $page->lastAdminId = Auth::id();
            $delete = $page->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$page['title'.__('lang.lang_db')]." deleted the page";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.page.index',[
                'delete' => $delete,
            ]);
        }elseif(isset($request->makeCover)){
            $oldCover = PageImagesModel::where([["status","=","1"],["cover","=","1"],["pageId","=",$page['id']]])->first();
            if(!empty($oldCover)){
                $oldCover['cover'] = "0";
                $oldUpdate = $oldCover->save();
            }
            $coverImageId = $_POST['makeCover'];
            $coverImage = PageImagesModel::findOrFail($coverImageId);
            $coverImage['cover'] = "1";
            $page['coverImage'] = $coverImage['image'];
            $updatepageCoverImage = $page->save();
            $coverImage->lastDate = date('Y-m-d H:i:s');
            $coverImage->lastAdminId = Auth::id();
            $update = $coverImage->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." added page cover image";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            $pageImages = PageImagesModel::where([["status","=","1"],["pageId","=",$page['id']]])->orderBy('id','ASC')->get();
            return redirect()->route('admin.page.edit',[
                'update' => $update,
                $page['id'] => $page['id']
            ])->with(compact([['pageImages']]));
        }elseif(isset($request->deleteImage)){
            $deleteImageId = $_POST['deleteImage'];
            $deleteImage = PageImagesModel::findOrFail($deleteImageId);
            $deleteImage->status = "0";
            $deleteImage->cover = "0";
            $deleteImage->lastDate = date('Y-m-d H:i:s');
            $deleteImage->lastAdminId = Auth::id();
            $update = $deleteImage->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." page titled image deleted";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            $pageImages = PageImagesModel::where([["status","=","1"],["pageId","=",$page['id']]])->orderBy('id','ASC')->get();
            return redirect()->route('admin.page.edit',[
                'update' => $update,
                $page['id'] => $page['id']
            ])->with(compact([['pageImages']]));
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
