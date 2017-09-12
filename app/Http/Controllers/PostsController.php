<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class PostsController extends Controller
{
    public function store(Request $request)
    {
        $user = Sentinel::getUser();
        if($user->hasAccess('posts.create'))
            return $request->all();
        else
            abort(403,'Authorized access!');
    }
}
