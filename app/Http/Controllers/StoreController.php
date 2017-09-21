<?php

namespace App\Http\Controllers;

use App\company;
use App\store;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $role = Sentinel::findRoleBySlug('storeuser');

        $users = $role->users()->with('roles')->get();

     //   dd($users);

        return view('store.create', compact ('users'));

    }

    public function store(Request $request)
    {
        $user_id = $request->get('contact_person_id');

        $user=User::find($user_id);

        //dd($user);

        $company=Company::find($user->companies()->first());

        //  dd($company);

        $company_id = (int) $company[0]->id;


        $store = new Store([
            'name' => $request->get('name'),
            'company_id' => $company_id,
            'address_line1' => $request->get('address_line1'),
            'address_line2' => $request->get('address_line2'),
            'zip' => $request->get('zip'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'telephone' => $request->get('telephone'),
            'email' => $request->get('email'),
            'contact_person_id' => $request->get('contact_person_id')
        ]);

        $store->save();


        return redirect('/stores');
    }

    public function show($id)
    {
        $store = Store::findOrFail($id);

        return view('store.show', compact('store'));
    }

    public function edit($id)
    {
        $store = Store::findOrFail($id);

        $role='storeuser';

        $id = $store->id;

        $users = DB::table('users')
            ->join('company_user','users.id','company_user.user_id')
            ->join('role_users','users.id','role_users.user_id')
            ->join('roles','role_users.role_id','roles.id')
            ->where([
                ['company_user.company_id',$store->company_id],
                ['roles.slug',$role]
            ])->get();

        return view('store.edit', compact('store' , 'users'));
    }

    public function update(Request $request, $id)
    {
        $store = Store::findOrFail($id);

        $store->update($request->all());

        return redirect('/stores');
    }

    public function destroy($id)
    {


        $store = Store::findOrFail($id);

        $store->delete();

        return redirect('/stores');
    }


}
