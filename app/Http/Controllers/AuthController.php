<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @return Application|Factory|View
     */
    public function loginView()
    {
        return view('login/main', [
            'layout' => 'login'
        ]);
    }

    /**
     * Authenticate login user.
     *
     * @param LoginRequest $request
     * @return void
     * @throws Exception
     */
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            throw new Exception('Wrong email or password.');
        }
    }

    /**
     * Logout user.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
