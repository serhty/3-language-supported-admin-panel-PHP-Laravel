<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CategoriesModel;
use App\Models\Admin\CategoryImagesModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $categories = CategoriesModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.categories.category-list',compact([['categories'],['settings']]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = SettingsModel::findOrFail(1);
        return view('admin.categories.category-add')->with(compact([['settings']]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryCheck = CategoriesModel::where([["status","=","1"],["title_de","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_en","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_ru","=",$request['title'.__('lang.lang_db')]]])->get();
        if(!empty($categoryCheck[0])){
            return redirect()->route('admin.category.create',[
                'check' => "check"
            ]);
        }else{
            $category = new CategoriesModel;
            $category['status'] = "1";
            $category['title_de'] = $request['title'.__('lang.lang_db')];
            $category['link_de'] = Str::slug($request['title'.__('lang.lang_db')]);
            $category['title_en'] = $request['title'.__('lang.lang_db')];
            $category['link_en'] = Str::slug($request['title'.__('lang.lang_db')]);
            $category['title_ru'] = $request['title'.__('lang.lang_db')];
            $category['link_ru'] = Str::slug($request['title'.__('lang.lang_db')]);
            $category['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
            $category['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
            $category['content'.__('lang.lang_db')] = $request['content'.__('lang.lang_db')];
            $category->lastDate = date('Y-m-d H:i:s');
            $category->lastAdminId = Auth::id();
            $add = $category->save();
            if($request->hasFile('image')){
                foreach($request->image as $image){
                    $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                    $imageName = substr(str_shuffle($str), 0, 10).'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('images'),$imageName);
                    $categoryImage = new CategoryImagesModel;
                    $categoryImage['status'] = "1";
                    $categoryImage['categoryId'] = $category['id'];
                    $categoryImage['cover'] = "0";
                    $categoryImage['image'] = $imageName;
                    $categoryImage->lastDate = date('Y-m-d H:i:s');
                    $categoryImage->lastAdminId = Auth::id();
                    $addImage = $categoryImage->save();
                }
            }

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." added a category";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            $categoryImages = CategoryImagesModel::where([["status","=","1"],["categoryId","=",$category['id']]])->orderBy('id','ASC')->get();
            return redirect()->route('admin.category.edit',[
                'add' => $add,
                $category['id'] => $category['id']
            ])->with(compact([['categoryImages']]));
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
        $category = CategoriesModel::findOrFail($id);
        $categoryImages = CategoryImagesModel::where([["status","=","1"],["categoryId","=",$id]])->orderBy('id','ASC')->get();
        return view('admin.categories.category-update',compact([['category'],['categoryImages'],['settings']]));
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
        $category = CategoriesModel::findOrFail($id);
        if(isset($request->categoryUpdate)){
            $categoryCheck = CategoriesModel::where([["status","=","1"],["title_de","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_en","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_ru","=",$request['title'.__('lang.lang_db')]]])->get();
            if(!empty($categoryCheck[0])){
                $category['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
                $category['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
                $category['content'.__('lang.lang_db')] = $request['content'.__('lang.lang_db')];
                $category->lastDate = date('Y-m-d H:i:s');
                $category->lastAdminId = Auth::id();
                $update = $category->save();
                if($request->hasFile('image')){
                    foreach($request->image as $image){
                        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                        $imageName = substr(str_shuffle($str), 0, 10).'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('images'),$imageName);
                        $categoryImage = new CategoryImagesModel;
                        $categoryImage['status'] = "1";
                        $categoryImage['categoryId'] = $category['id'];
                        $categoryImage['cover'] = "0";
                        $categoryImage['image'] = $imageName;
                        $categoryImage->lastDate = date('Y-m-d H:i:s');
                        $categoryImage->lastAdminId = Auth::id();
                        $addImage = $categoryImage->save();
                    }
                }

                $transaction = new LatestTransactionsModel;
                $transaction->status = "1";
                $transaction->adminId = Auth::id();
                $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." Created a category titled";
                $transaction->transactionDate = date('Y-m-d H:i:s');
                $transactionAdd = $transaction->save();

                $categoryImages = CategoryImagesModel::where([["status","=","1"],["categoryId","=",$category['id']]])->orderBy('id','ASC')->get();
                return redirect()->route('admin.category.edit',[
                    'check' => "check",
                    $category['id'] => $category['id']
                ])->with(compact([['categoryImages'],['features']]));
            }else{
                $categories = CategoriesModel::where("status","=","1")->orderBy('id','ASC')->get();
                $category['title'.__('lang.lang_db')] = $request['title'.__('lang.lang_db')];
                $category['link'.__('lang.lang_db')] = Str::slug($request['title'.__('lang.lang_db')]);
                $category['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
                $category['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
                $category['content'.__('lang.lang_db')] = $request['content'.__('lang.lang_db')];
                $category->lastDate = date('Y-m-d H:i:s');
                $category->lastAdminId = Auth::id();
                $update = $category->save();
                if($request->hasFile('image')){
                    foreach($request->image as $image){
                        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                        $imageName = substr(str_shuffle($str), 0, 10).'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('images'),$imageName);
                        $categoryImage = new CategoryImagesModel;
                        $categoryImage['status'] = "1";
                        $categoryImage['categoryId'] = $category['id'];
                        $categoryImage['cover'] = "0";
                        $categoryImage['image'] = $imageName;
                        $categoryImage->lastDate = date('Y-m-d H:i:s');
                        $categoryImage->lastAdminId = Auth::id();
                        $addImage = $categoryImage->save();
                    }
                }

                $transaction = new LatestTransactionsModel;
                $transaction->status = "1";
                $transaction->adminId = Auth::id();
                $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." Created a category titled";
                $transaction->transactionDate = date('Y-m-d H:i:s');
                $transactionAdd = $transaction->save();

                $categoryImages = CategoryImagesModel::where([["status","=","1"],["categoryId","=",$category['id']]])->orderBy('id','ASC')->get();
                return redirect()->route('admin.category.edit',[
                    'update' => $update,
                    $category['id'] => $category['id']
                ])->with(compact([['categoryImages']]));
            }
        }elseif(isset($request->categoryDelete)){
            $category->status = "0";
            $category->lastDate = date('Y-m-d H:i:s');
            $category->lastAdminId = Auth::id();
            $delete = $category->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." category has been deleted";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.category.index',[
                'delete' => $delete,
            ]);
        }elseif(isset($request->makeCover)){
            $oldCover = CategoryImagesModel::where([["status","=","1"],["cover","=","1"],["categoryId","=",$category['id']]])->first();
            if(!empty($oldCover)){
                $oldCover['cover'] = "0";
                $oldUpdate = $oldCover->save();
            }
            $coverImageId = $_POST['makeCover'];
            $coverImage = CategoryImagesModel::findOrFail($coverImageId);
            $coverImage['cover'] = "1";
            $category['coverImage'] = $coverImage['image'];
            $updatecategoryCoverImage = $category->save();
            $coverImage->lastDate = date('Y-m-d H:i:s');
            $coverImage->lastAdminId = Auth::id();
            $update = $coverImage->save();
            $categoryImages = CategoryImagesModel::where([["status","=","1"],["categoryId","=",$category['id']]])->orderBy('id','ASC')->get();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." Added category cover art with title";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.category.edit',[
                'update' => $update,
                $category['id'] => $category['id']
            ])->with(compact([['categoryImages']]));
        }elseif(isset($request->deleteImage)){
            $deleteImageId = $_POST['deleteImage'];
            $deleteImage = CategoryImagesModel::findOrFail($deleteImageId);
            $deleteImage->status = "0";
            $deleteImage->cover = "0";
            $deleteImage->lastDate = date('Y-m-d H:i:s');
            $deleteImage->lastAdminId = Auth::id();
            $update = $deleteImage->save();
            $categoryImages = CategoryImagesModel::where([["status","=","1"],["categoryId","=",$category['id']]])->orderBy('id','ASC')->get();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." The category titled has deleted the image";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.category.edit',[
                'update' => $update,
                $category['id'] => $category['id']
            ])->with(compact([['categoryImages']]));
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
