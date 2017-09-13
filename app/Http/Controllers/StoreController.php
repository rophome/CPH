<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\store;
use App\company;
use App\User;



class StoreController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = Sentinel::getUser();


        if($user->hasAccess('store.list'))
        {
            if(Sentinel::inRole('admin')){
                $stores=DB::table('stores')->get();
            }else {
                $stores = DB::table('stores')
                    ->join('company_users', 'stores.company_id', 'company_users.company_id')
                    ->where('company_users.user_id', $user->id)->get();
            }
            return view ('store.list',compact('stores'));
        }
        else
            abort(403,'Authorized access!');
    }

    public function create()
    {
        return ('not implemented yet');
    }

    public function store(Request $request)
    {
        return ('not implemented yet');
    }

    public function show($id)
    {
        $sore = Store::findOrFail($id);

        return view('store.show', compact('store'));
    }

    public function edit($id)
    {
        $sore = Store::findOrFail($id);

        return view('store.edit', compact('store'));
    }

    public function update(Request $request, $id)
    {
        $store = Store::findOrFail($id);

        $store->update($request->all());

        return redirect('/stores');
    }

    public function destroy($id)
    {
        return ('not implemented yet');
    }


}
