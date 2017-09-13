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
                return redirect()->back()->with(['error'=>'Wrong cridentials.']);
            }
        }catch (ThrottlingException $e) {
            $delay=$e->getDelay();

            return redirect()->back()->with(['error' => "You are banned for $delay seconds!"]);
        }catch (NotActivatedException $e) {
            return redirect()->back()->with(['error' => 'Account not activated yet!']);
        }
    }

    public function logout()
    {
        Sentinel::logout();

        return redirect('/login');
    }

}
