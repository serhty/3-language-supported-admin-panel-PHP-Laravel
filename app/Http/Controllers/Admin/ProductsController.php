<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ProductsModel;
use App\Models\Admin\ProductImagesModel;
use App\Models\Admin\CategoriesModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $products = ProductsModel::where("status","=","1")->orderBy('id','ASC')->get();
        $categories = CategoriesModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.products.product-list',compact([['products'],['categories'],['settings']]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = SettingsModel::findOrFail(1);
        $categories = CategoriesModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.products.product-add')->with(compact([['categories'],['settings']]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productCheck = ProductsModel::where([["status","=","1"],["title_de","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_en","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_ru","=",$request['title'.__('lang.lang_db')]]])->get();
        if(!empty($productCheck[0])){
            return redirect()->route('admin.product.create',[
                'check' => "check"
            ]);
        }else{
            $product = new ProductsModel;
            $product['status'] = "1";
            $product['title_de'] = $request['title'.__('lang.lang_db')];
            $product['link_de'] = Str::slug($request['title'.__('lang.lang_db')]);
            $product['title_en'] = $request['title'.__('lang.lang_db')];
            $product['link_en'] = Str::slug($request['title'.__('lang.lang_db')]);
            $product['title_ru'] = $request['title'.__('lang.lang_db')];
            $product['link_ru'] = Str::slug($request['title'.__('lang.lang_db')]);
            $product['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
            $product['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
            $product['content'.__('lang.lang_db')] = $request['content'.__('lang.lang_db')];
            $product['formTitle'.__('lang.lang_db')] = $request['formTitle'.__('lang.lang_db')];
            $product['orderForm'] = $request["orderForm"];
            $product['feature'.__('lang.lang_db')] = $request['feature'.__('lang.lang_db')];
            $product['type'.__('lang.lang_db')] = $request['type'.__('lang.lang_db')];
            $product['categoryId'] = $request["category"];
            $product['stock'] = $request["stock"];
            if(!empty($request["price"])){
                $product['price'] = str_replace(",",".",$request["price"]);
                $product['discount'] = $request["discount"];
                $product['currency'] = $request["currency"];
                if(!empty($request['discount'])){
                    $product['discountedPrice'] = ($request['price'] - (($request['price']*$request["discount"])/100));
                    $product['finalPrice'] = $product['discountedPrice'];
                }else{
                    $product['finalPrice'] = $request['price'];
                }
            }
            $product->lastDate = date('Y-m-d H:i:s');
            $product->lastAdminId = Auth::id();
            $add = $product->save();
            if($request->hasFile('image')){
                foreach($request->image as $image){
                    $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                    $imageName = substr(str_shuffle($str), 0, 10).'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('images'),$imageName);
                    $productImage = new ProductImagesModel;
                    $productImage['status'] = "1";
                    $productImage['productId'] = $product['id'];
                    $productImage['cover'] = "0";
                    $productImage['image'] = $imageName;
                    $productImage->lastDate = date('Y-m-d H:i:s');
                    $productImage->lastAdminId = Auth::id();
                    $addImage = $productImage->save();
                }
            }

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." Added product titled";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            $productImages = ProductImagesModel::where([["status","=","1"],["productId","=",$product['id']]])->orderBy('id','ASC')->get();
            return redirect()->route('admin.product.edit',[
                'add' => $add,
                $product['id'] => $product['id']
            ])->with(compact([['productImages']]));
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
        $product = ProductsModel::findOrFail($id);
        $productImages = ProductImagesModel::where([["status","=","1"],["productId","=",$product['id']]])->orderBy('id','ASC')->get();
        $categories = CategoriesModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.products.product-update',compact([['product'],['categories'],['productImages'],['settings']]));
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
        $product = ProductsModel::findOrFail($id);
        $categories = CategoriesModel::where("status","=","1")->orderBy('id','ASC')->get();
        if(isset($request->productUpdate)){
            $productCheck = ProductsModel::where([["status","=","1"],["title_de","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_en","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_ru","=",$request['title'.__('lang.lang_db')]]])->get();
            if(!empty($productCheck[0])){
                $product['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
                $product['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
                $product['content'.__('lang.lang_db')] = $request['content'.__('lang.lang_db')];
                $product['formTitle'.__('lang.lang_db')] = $request['formTitle'.__('lang.lang_db')];
                $product['orderForm'] = $request["orderForm"];
                $product['feature'.__('lang.lang_db')] = $request['feature'.__('lang.lang_db')];
                $product['type'.__('lang.lang_db')] = $request['type'.__('lang.lang_db')];
                $product['categoryId'] = $request["category"];
                $product['stock'] = $request["stock"];
                if(!empty($request["price"])){
                    $product['price'] = str_replace(",",".",$request["price"]);
                    $product['discount'] = $request["discount"];
                    $product['currency'] = $request["currency"];
                    if(!empty($request['discount'])){
                        $product['discountedPrice'] = ($request['price'] - (($request['price']*$request["discount"])/100));
                        $product['finalPrice'] = $product['discountedPrice'];
                    }else{
                        $product['finalPrice'] = $request['price'];
                    }
                }
                $product->lastDate = date('Y-m-d H:i:s');
                $product->lastAdminId = Auth::id();
                $update = $product->save();
                if($request->hasFile('image')){
                    foreach($request->image as $image){
                        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                        $imageName = substr(str_shuffle($str), 0, 10).'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('images'),$imageName);
                        $productImage = new ProductImagesModel;
                        $productImage['status'] = "1";
                        $productImage['productId'] = $product['id'];
                        $productImage['cover'] = "0";
                        $productImage['image'] = $imageName;
                        $productImage->lastDate = date('Y-m-d H:i:s');
                        $productImage->lastAdminId = Auth::id();
                        $addImage = $productImage->save();
                    }
                }

                $transaction = new LatestTransactionsModel;
                $transaction->status = "1";
                $transaction->adminId = Auth::id();
                $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." edited product titled";
                $transaction->transactionDate = date('Y-m-d H:i:s');
                $transactionAdd = $transaction->save();

                $productImages = ProductImagesModel::where([["status","=","1"],["productId","=",$product['id']]])->orderBy('id','ASC')->get();
                return redirect()->route('admin.product.edit',[
                    'check' => "check",
                    $product['id'] => $product['id']
                ])->with(compact([['productImages'],['categories']]));
            }else{
                $product['title'.__('lang.lang_db')] = $request['title'.__('lang.lang_db')];
                $product['link'.__('lang.lang_db')] = Str::slug($request['title'.__('lang.lang_db')]);
                $product['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
                $product['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
                $product['content'.__('lang.lang_db')] = $request['content'.__('lang.lang_db')];
                $product['formTitle'.__('lang.lang_db')] = $request['formTitle'.__('lang.lang_db')];
                $product['orderForm'] = $request["orderForm"];
                $product['feature'.__('lang.lang_db')] = $request['feature'.__('lang.lang_db')];
                $product['type'.__('lang.lang_db')] = $request['type'.__('lang.lang_db')];
                $product['categoryId'] = $request["category"];
                $product['stock'] = $request["stock"];
                if(!empty($request["price"])){
                    $product['price'] = str_replace(",",".",$request["price"]);
                    $product['discount'] = $request["discount"];
                    $product['currency'] = $request["currency"];
                    if(!empty($request['discount'])){
                        $product['discountedPrice'] = ($request['price'] - (($request['price']*$request["discount"])/100));
                        $product['finalPrice'] = $product['discountedPrice'];
                    }else{
                        $product['finalPrice'] = $request['price'];
                    }
                }
                $product->lastDate = date('Y-m-d H:i:s');
                $product->lastAdminId = Auth::id();
                $update = $product->save();
                if($request->hasFile('image')){
                    foreach($request->image as $image){
                        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                        $imageName = substr(str_shuffle($str), 0, 10).'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('images'),$imageName);
                        $productImage = new ProductImagesModel;
                        $productImage['status'] = "1";
                        $productImage['productId'] = $product['id'];
                        $productImage['cover'] = "0";
                        $productImage['image'] = $imageName;
                        $productImage->lastDate = date('Y-m-d H:i:s');
                        $productImage->lastAdminId = Auth::id();
                        $addImage = $productImage->save();
                    }
                }

                $transaction = new LatestTransactionsModel;
                $transaction->status = "1";
                $transaction->adminId = Auth::id();
                $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." edited product titled";
                $transaction->transactionDate = date('Y-m-d H:i:s');
                $transactionAdd = $transaction->save();

                $productImages = ProductImagesModel::where([["status","=","1"],["productId","=",$product['id']]])->orderBy('id','ASC')->get();
                return redirect()->route('admin.product.edit',[
                    'update' => $update,
                    $product['id'] => $product['id']
                ])->with(compact([['productImages'],['categories']]));
            }
        }elseif(isset($request->productDelete)){
            $product->status = "0";
            $product->lastDate = date('Y-m-d H:i:s');
            $product->lastAdminId = Auth::id();
            $delete = $product->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." titled product deleted";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.product.index',[
                'delete' => $delete,
            ]);
        }elseif(isset($request->makeCover)){
            $oldCover = ProductImagesModel::where([["status","=","1"],["cover","=","1"],["productId","=",$product['id']]])->first();
            if(!empty($oldCover)){
                $oldCover['cover'] = "0";
                $oldUpdate = $oldCover->save();
            }
            $coverImageId = $_POST['makeCover'];
            $coverImage = ProductImagesModel::findOrFail($coverImageId);
            $coverImage['cover'] = "1";
            $product['coverImage'] = $coverImage['image'];
            $updateproductCoverImage = $product->save();
            $coverImage->lastDate = date('Y-m-d H:i:s');
            $coverImage->lastAdminId = Auth::id();
            $update = $coverImage->save();
            $productImages = ProductImagesModel::where([["status","=","1"],["productId","=",$product['id']]])->orderBy('id','ASC')->get();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." Added product cover image";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.product.edit',[
                'update' => $update,
                $product['id'] => $product['id']
            ])->with(compact([['productImages']]));

        }elseif(isset($request->deleteImage)){
            $deleteImageId = $_POST['deleteImage'];
            $deleteImage = ProductImagesModel::findOrFail($deleteImageId);
            $deleteImage->status = "0";
            $deleteImage->cover = "0";
            $deleteImage->lastDate = date('Y-m-d H:i:s');
            $deleteImage->lastAdminId = Auth::id();
            $update = $deleteImage->save();
            $productImages = ProductImagesModel::where([["status","=","1"],["productId","=",$product['id']]])->orderBy('id','ASC')->get();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." titled product image deleted";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.product.edit',[
                'update' => $update,
                $product['id'] => $product['id']
            ])->with(compact([['productImages']]));
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
