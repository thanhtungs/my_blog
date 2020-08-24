<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginRequest $request)
    {
        $loginType = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL )
            ? 'email'
            : 'phone';

        $request->merge([
            $loginType => $request->input('login')
        ]);

        if (Auth::attempt($request->only($loginType, 'password'))) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect()->back()
            ->withInput()
            ->withErrors([
                'login' => 'Tài khoản hoặc mật khẩu không chính xác',
            ]);
    }
}
