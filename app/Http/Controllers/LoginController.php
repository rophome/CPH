<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;


class LoginController extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function postlogin(Request $request)
    {
        try {
            $rememberMe=false;

            if(isset($request->remember_me))
                $rememberMe=true;

            if (Sentinel::authenticate($request->all(),$rememberMe)) {
                $slug = Sentinel::getUser()->roles()->first()->slug;

                if ($slug == 'admin')
                    return redirect ('/companies');
                elseif ($slug == 'manager')
                    return redirect ('/companies');
                else
                    return 'No valid group';
            } else {
            dd($request);
                return redirect()->back()->with(['error'=>'Wrong cridentials.']);
            }
        }catch (ThrottlingException $e) {
            $delay=$e->getDelay();

            return response()->json(['error' => "You are banned for $delay seconds!"],500);
        }catch (NotActivatedException $e) {
            return response()->json(['error' => 'Account not activated yet!'],500);
        }
    }

    public function logout()
    {
        Sentinel::logout();

        return redirect('/login');
    }

}
