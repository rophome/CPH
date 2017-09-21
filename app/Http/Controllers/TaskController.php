<?php

namespace App\Http\Controllers;

use App\task;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = Sentinel::getUser();

        if ($user->hasAccess('task.list')) {
            if (Sentinel::inRole('admin')) {
                $tasks = task::all();
            } elseif (Sentinel::inRole('manager')) {
                $tasks = task::whereHas('company.users', function ($q) {
                    $q->where('users.id', '=', Sentinel::getUser()->id);
                })->get();
            } else {
                $tasks = task::whereHas('store.user', function ($q) {
                    $q->where('users.id', '=', Sentinel::getUser()->id);
                })->get();
            }

            return view('task.list', compact('tasks', 'user'));
        } else
            abort(403, 'Authorized access!');
    }

    public function create()
    {

        return view('task.create', compact('users'));

    }

    public function store(Request $request)
    {

        return redirect('/tasks');
    }

    public function show($id)
    {
        return view('task.show', compact('store'));
    }

    public function edit($id)
    {

        return view('task.edit', compact('store', 'users'));
    }

    public function update(Request $request, $id)
    {

        return redirect('/tasks');
    }

    public function destroy($id)
    {

        return redirect('/tasks');
    }


}
