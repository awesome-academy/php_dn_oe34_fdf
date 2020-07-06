<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * @var AuthService
     */
    protected $authService;

    public function __construct()
    {
        $this->authService = app('auth_service');
    }

    public function showRegisterForm()
    {
        return view('users.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $params = $request->except('_token', 'password_confirmation');

        list($status, $message) = $this->authService->registerUser($params);

        if ($status) {
            return redirect(route('user.login-form'))->with(['success' => $message]);
        }

        return redirect()->back()->withErrors(['errors' => $message]);
    }

    public function verifyAccount(Request $request)
    {
        $verifyToken = $request->get('verify_token');

        list($email, $dateTime) = $this->authService->decodeToken($verifyToken);

        $tokenExpired = GlobalHelper::checkExpiredDate($dateTime, 2);

        if ($tokenExpired) {
            $messages = $this->authService->updateNewToken($email);

            return abort(403, $messages);
        }

        $status = $this->authService->verifyAccount($email);

        if ($status) {
            return redirect(route('homepage')); //In future: Redirects to profile and notify user successfully verified
        }

        return abort(403, trans('messages.verify_failed'));
    }
}
