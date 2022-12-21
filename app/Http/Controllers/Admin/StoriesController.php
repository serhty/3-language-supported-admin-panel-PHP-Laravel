<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\StoriesModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsModel::findOrFail(1);
        $stories = StoriesModel::where("status","=","1")->orderBy('id','ASC')->get();
        return view('admin.stories.story-list',compact(['stories'],['settings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = SettingsModel::findOrFail(1);
        return view('admin.stories.story-add',compact(['settings']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $story = new StoriesModel;
        $story['status'] = "1";
        $story['title'] = $request['title'];
        $story['link'] = $request['link'];
        $story->lastDate = date('Y-m-d H:i:s');
        $story->lastAdminId = Auth::id();
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:5120'
        ]);
        if($request->hasFile('image')){
            $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
            $imageName = substr(str_shuffle($str), 0, 10).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'),$imageName);
            $story->image = $imageName;
        }
        $add = $story->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username.", ".$request['title'.__('lang.lang_db')]." added a story";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        return redirect()->route('admin.story.edit',[
            'add' => $add,
            $story->id => $story->id
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
        $story = StoriesModel::findOrFail($id);
        return view('admin.stories.story-update',compact(['story'],['settings']));
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
        $story = StoriesModel::findOrFail($id);
        if(isset($request->storyUpdate)){
            $story['title'] = $request['title'];
            $story['link'] = $request['link'];
            $story->lastDate = date('Y-m-d H:i:s');
            $story->lastAdminId = Auth::id();
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg|max:5120'
            ]);
            if($request->hasFile('image')){
                $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
                $imageName = substr(str_shuffle($str), 0, 10).'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'),$imageName);
                $story->image = $imageName;
            }
            $update = $story->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$story['title'.__('lang.lang_db')]." edited the story";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.story.edit',[
                'update' => $update,
                $story->id => $story->id
            ]);
        }elseif(isset($request->storyDelete)){
            $story->status = "0";
            $story->lastDate = date('Y-m-d H:i:s');
            $story->lastAdminId = Auth::id();
            $delete = $story->save();

            $transaction = new LatestTransactionsModel;
            $transaction->status = "1";
            $transaction->adminId = Auth::id();
            $transaction->transaction = Auth::user()->username.", ".$story['title'.__('lang.lang_db')]." story deleted";
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transactionAdd = $transaction->save();

            return redirect()->route('admin.story.index',[
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
