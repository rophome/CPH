<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use App\User;
use Mail;
use Nexmo\Laravel\Facade\Nexmo;

class RegistrationController extends Controller
{
    public function register()
    {
        return view('authentication.register');
    }

    public function postRegister(Request $request)
    {
        $user = Sentinel::register($request->all());
        $activation = Activation::create($user);
        $role = Sentinel::findRoleBySlug('manager');
        $role->users()->attach($user);
        $this->sendEmail($user, $activation->code);
        $this->sendSMS($user, $activation->code);

        return redirect('/');
    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.activation', [
            'user' => $user,
            'code' => $code
        ], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->first_name, please activate your account.");
        });
    }

    private function sendSMS($user,$code)
    {
        Nexmo::message()->send([
            'to' => '4529482032',
            'from' => 'CPH Varmeteknik',
            'text' => "Hi $user->first_name please register with http://localhost/activate/$user->email/$code then you can use the laravel site."
        ]);
    }
}