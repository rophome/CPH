<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Illuminate\Support\Facades\Mail;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('authentication.forgot-password');
    }

    public function postForgotPassword(Request $request)
    {
        $user=User::whereEmail($request->email)->first();

        if(count($user)==0)
            return redirect()->back()->with(['error' => 'Email address does not belong to a valid user']);

        $reminder=Reminder::exists($user) ?: Reminder::create($user);
        $this->sendReminder($user,$reminder->code);
        return redirect()->back()->with(['success' => 'Reset code was sent to user.']);
    }

    public function resetPassword($email,$resetCode)
    {
        $user = User::byEmail($email);
        if (count($user)==0)
            abort(404);
        else
        if ($reminder = Reminder::exists($user)) {
            if($resetCode==$reminder->code)
                return view('authentication.reset-password');
            else
                return redirect ('/login');
        }
        else {
            return redirect ('/login');
        }
    }

    public function postResetPassword(Request $request,$email,$resetCode)
    {
        $this->validate($request,[
            'password' => 'confirmed|required|min:5|max:10',
            'password_confirmation' => 'required|min:5|max:10'
        ]);
        $user = User::byEmail($email);
        if (count($user)==0)
            abort(404);
        else

        if ($reminder = Reminder::exists($user)) {
            if($resetCode==$reminder->code) {
                Reminder::complete($user, $resetCode, $request->password);
                return redirect('/login')->with('success', 'Please login with your new password');
            }
            else
                return redirect ('/login');
        }
        else {
            return redirect ('/login');
        }


    }

    private function sendReminder($user,$code)
    {
       Mail::send('emails.forgot-password', [
        'user' => $user,
        'code' => $code
    ],function($message) use ($user) {
                                        $message->to($user->email);
                                        $message->subject("Hello $user->first_name, please reset your password!");
                                    }
                );
    }
}
