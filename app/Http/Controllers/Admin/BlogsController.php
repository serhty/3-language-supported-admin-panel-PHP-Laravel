<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\BlogsModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $blogs = BlogsModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.blogs.blog-list',compact([['blogs'],['settings']]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = SettingsModel::findOrFail(1);
        return view('admin.blogs.blog-add',compact([['settings']]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new BlogsModel;
        $blog['status'] = "1";
        $blog['title_de'] = $request['title'.__('lang.lang_db')];
        $blog['link_de'] = Str::slug($request['title'.__('lang.lang_db')]);
        $blog['title_en'] = $request['title'.__('lang.lang_db')];
        $blog['link_en'] = Str::slug($request['title'.__('lang.lang_db')]);
        $blog['title_ru'] = $request['title'.__('lang.lang_db')];
        $blog['link_ru'] = Str::slug($request['title'.__('lang.lang_db')]);
        $blog['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
        $blog['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
        $blog['content'.__('lang.lang_db')] = $request['content'.__('lang.lang_db')];
        $blog->lastDate = date('Y-m-d H:i:s');
        $blog->lastAdminId = Auth::id();
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:5120'
        ]);
        if($request->hasFile('image')){
            $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
            $imageName = substr(str_shuffle($str), 0, 10).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'),$imageName);
            $blog->image = $imageName;
        }
        $blogCheck = BlogsModel::where([["status","=","1"],["title_de","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_en","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_ru","=",$request['title'.__('lang.lang_db')]]])->get();
        if(!empty($blogCheck[0])){
            return redirect()->route('admin.blog.create',[
                'check' => "check"
            ]);
        }else{
            $add = $blog->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." Added a blog post titled";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
            
            return redirect()->route('admin.blog.edit',[
                'add' => $add,
                $blog->id => $blog->id
            ]);
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
        $blog = BlogsModel::findOrFail($id);
        return view('admin.blogs.blog-update',compact([['blog'],['settings']]));
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
        $blog = BlogsModel::findOrFail($id);
        if(isset($request->blogUpdate)){
            $blogCheck = BlogsModel::where([["status","=","1"],["title_de","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_en","=",$request['title'.__('lang.lang_db')]]])->orwhere([["status","=","1"],["title_ru","=",$request['title'.__('lang.lang_db')]]])->get();
            if(!empty($blogCheck[0])){
                $blog['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
                $blog['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
                $blog['content'.__('lang.lang_db')] = $request['content'.__('lang.lang_db')];
                $blog->lastDate = date('Y-m-d H:i:s');
                $blog->lastAdminId = Auth::id();
              
                if($request->hasFile('image')){
                    $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                    $imageName = substr(str_shuffle($str), 0, 10).'.'.$request->image->getClientOriginalExtension();
                    $request->image->move(public_path('images'),$imageName);
                    $blog->image = $imageName;
                }
                $update = $blog->save();

                $transaction = new LatestTransactionsModel;
                $transaction->status = "1";
                $transaction->adminId = Auth::id();
                $transaction->transaction = Auth::user()->username.", ".$blog['title'.__('lang.lang_db')]." edited the blog post";
                $transaction->transactionDate = date('Y-m-d H:i:s');
                $transactionAdd = $transaction->save();

                return redirect()->route('admin.blog.edit',[
                    'check' => "check",
                    $blog->id => $id
                ]);
            }else{
                $blog['title'.__('lang.lang_db')] = $request['title'.__('lang.lang_db')];
                $blog['link'.__('lang.lang_db')] = Str::slug($request['title'.__('lang.lang_db')]);
                $blog['description'.__('lang.lang_db')] = $request['description'.__('lang.lang_db')];
                $blog['keywords'.__('lang.lang_db')] = $request['keywords'.__('lang.lang_db')];
                $blog['content'.__('lang.lang_db')] = $request['content'.__('lang.lang_db')];
                $blog->lastDate = date('Y-m-d H:i:s');
                $blog->lastAdminId = Auth::id();
              
                if($request->hasFile('image')){
                    $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                    $imageName = substr(str_shuffle($str), 0, 10).'.'.$request->image->getClientOriginalExtension();
                    $request->image->move(public_path('images'),$imageName);
                    $blog->image = $imageName;
                }
                $update = $blog->save();

                $transaction = new LatestTransactionsModel;
                $transaction->status = "1";
                $transaction->adminId = Auth::id();
                $transaction->transaction = Auth::user()->username.", ".$blog['title'.__('lang.lang_db')]." edited the blog post";
                $transaction->transactionDate = date('Y-m-d H:i:s');
                $transactionAdd = $transaction->save();
                
                return redirect()->route('admin.blog.edit',[
                    'update' => $update,
                    $blog->id => $blog->id
                ]);
            }
        }elseif(isset($request->blogDelete)){
            $blog->status = "0";
            $blog->lastDate = date('Y-m-d H:i:s');
            $blog->lastAdminId = Auth::id();
            $delete = $blog->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$blog['title'.__('lang.lang_db')]." deleted the blog post";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();
            
            return redirect()->route('admin.blog.index',[
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
