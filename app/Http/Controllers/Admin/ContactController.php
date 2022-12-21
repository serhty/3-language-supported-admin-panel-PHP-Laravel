<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ContactModel;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LatestTransactionsModel;
use App\Models\Admin\SettingsModel;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $contact = ContactModel::findOrFail($id);
        return view('admin.contact',compact([['contact'],['settings']]));
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
        $contact = ContactModel::findOrFail($id);
        $contact->whatsapp = $request->whatsapp;
        $contact->whatsappButton = $request->whatsappButton;
        $contact->phone1 = $request->phone1;
        $contact->phone2 = $request->phone2;
        $contact->mail1 = $request->mail1;
        $contact->mail2 = $request->mail2;
        $contact->address = $request->address;
        $location1 = str_replace('<iframe src="','',$request->location);
        $location2 = str_replace('" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>','',$location1);
        $contact->location = $location2;
        $contact->facebook = $request->facebook;
        $contact->instagram = $request->instagram;
        $contact->twitter = $request->twitter;
        $contact->pinterest = $request->pinterest;
        $contact->linkedin = $request->linkedin;
        $contact->youtube = $request->youtube;
        $contact->tumblr = $request->tumblr;
        $contact->reddit = $request->reddit;
        $contact->lastDate = $request->lastDate;
        $contact->lastAdminId = $request->lastAdminId;
        $update = $contact->save();

        $transaction = new LatestTransactionsModel;
        $transaction->status = "1";
        $transaction->adminId = Auth::id();
        $transaction->transaction = Auth::user()->username." contact information updated";
        $transaction->transactionDate = date('Y-m-d H:i:s');
        $transactionAdd = $transaction->save();

        return redirect()->route('admin.contact.edit',[
            'update' => $update,
            $id => 1
        ]);
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
