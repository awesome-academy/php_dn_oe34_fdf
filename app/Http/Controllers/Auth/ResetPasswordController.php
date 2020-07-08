<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /**
     * @var AuthService
     */
    protected $authService;

    public function __construct()
    {
        $this->authService = app('auth_service');
    }

    public function showForgotPasswordForm(Request $request)
    {
        $uri = $request->getRequestUri();

        if (strpos($uri, 'admin')) {
            return view('admin.auth.forgot_password');
        }

        return view('users.auth.forgot_password');
    }

    public function sendForgotPasswordMail(ForgotPasswordRequest $request)
    {
        $params = $request->except('_token');

        $status = $this->authService->sendMail($params['email'], $request->getRequestUri());

        if ($status) {
            return redirect()->back()->with('success', trans('messages.send_mail_success'));
        }

        return redirect()->back()->withErrors(trans('messages.send_mail_failed'));
    }

    public function showResetPasswordForm(Request $request)
    {
        $uri = $request->getRequestUri();

        if (strpos($uri, 'admin')) {
            return view('admin.auth.reset_password');
        }

        return view('users.auth.reset_password');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $params = $request->except('_token', 'password_confirmation');

        $status = $this->authService->resetPassword($params);

        if ($status) {
            return redirect(route('user.login-form'))->with('success', trans('messages.reset_password_success'));
        }

        return redirect()->back()->withErrors(trans('messages.reset_password_failed'));
    }
}
