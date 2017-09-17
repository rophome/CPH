<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\company;
use App\User;
use Illuminate\Support\Facades\DB;


class CompanyController extends Controller
{
    public function index(Request $request)
    {
        if (Sentinel::check()) {
            $user = Sentinel::getUser();
            if ($user->hasAccess('company.list')) {
                $companies = Company::all();
  //          dd($companies);
                return view('company.list', compact('companies'));
            } else
                abort(403, 'Authorized access!');
        } else {
            abort(403, 'Authorized access!');
        }

    }

    public function create()
    {
        $role = Sentinel::findRoleBySlug('manager');

        $users = $role->users()->with('roles')->get();

        return view('company.create', compact ('users'));
    }

    public function store(Request $request)
    {
        $user_id = $request->get('company_contact_user_id');

        $company = new Company([
            'name' => $request->get('name'),
            'company_contact_user_id' => $user_id
        ]);

        $company->save();

        $user=User::find($user_id);
        $user->companies()->attach($company);


        return redirect('/companies');
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('company.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        $role = 'manager';

        $users = DB::table('users')
            ->join('company_user','users.id','company_user.user_id')
            ->join('role_users','users.id','role_users.user_id')
            ->join('roles','role_users.role_id','roles.id')
            ->where([
                ['company_user.company_id',$id],
                ['roles.slug',$role]
            ])->get();

//        dd($users);
        return view('company.edit', compact('users','company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->update($request->all());

        return redirect('/companies');
    }

    public function destroy($id)
    {

        $company = Company::findOrFail($id);

        $company->delete();

        return redirect('/companies');
    }

}




