<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Validator;
use App\User;

class AuthController extends Controller
{
    use ResetsPasswords;

    public function __construct(Guard $auth, PasswordBroker $passwords)
    {
        $this->auth = $auth;
        $this->passwords = $passwords;
    }
     public function ajaxlogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        $the_user = User::where('name','=',request('email'))->first();
        if($the_user){
            $request['email']=$the_user->email;
        }
        if (auth()->attempt(['email' => $request['email'], 'password' => request('password')], request('remember_me'))) {
            $user = User::where('email', request('email'))->first();
            return '/account';
        } else {
            return response()->json([
                'message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة'
            ], 401);
        }
    }
    public function sendResetLinkEmail(Request $request)
    {
        $validator = \Validator::make(
            ['email' => $request->get('email')],
            ['email' => 'required|email|min:6|max:255']
        );

        if($validator->passes()) {
            //$response = $this->passwords->sendResetLink($request->only('email'));
            $response = $this->passwords->sendResetLink($request->only('email'), function ($m) {
                $m->subject($this->getEmailSubject());
            });

            switch ($response) {
                case PasswordBroker::RESET_LINK_SENT:
                    return \Response::json(['success' => 'true']);
                
                case PasswordBroker::INVALID_USER:
                    return \Response::json(['success' => 'true', 'status' => trans($response)]);
            }
        } else {
            return \Response::json(['error' => [
                'messages' => $validator->getMessageBag(),
                'rules' => $validator->getRules()
            ]]);
        }
    }
    
}