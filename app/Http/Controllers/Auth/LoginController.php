<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    public function showAdminLoginForm()
    {
        if (Auth::check() && GlobalHelper::checkAdmin()) {
            return redirect(route('admin.dashboard'));
        }

        return view('admin.auth.login');
    }

    public function showUserLoginForm()
    {
        if (Auth::check()) {
            return redirect(route('homepage'));
        }

        return view('users.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $params = $request->except('_token');

        if (Auth::attempt($params)) {
            if (GlobalHelper::checkAdmin()) {
                return redirect(route('admin.dashboard'));
            }

            return back()->withErrors(trans('auth.not_admin'))->withInput();
        }

        return back()->withErrors(trans('auth.failed'))->withInput();
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('homepage'));
    }
}
