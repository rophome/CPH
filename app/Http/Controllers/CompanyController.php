<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\company;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        if (Sentinel::check()) {
            $user = Sentinel::getUser();
            if ($user->hasAccess('company.list')) {
                $companies = Company::all();
//            dd($companies);
                return view('company.list', compact('companies'));
            } else
                abort(403, 'Authorized access!');
        } else {
            abort(403, 'Authorized access!');
        }

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
        $company = Company::findOrFail($id);

        return view('company.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->update($request->all());

        return redirect('/companies');
    }

    public function destroy($id)
    {
        return ('not implemented yet');
    }

}




