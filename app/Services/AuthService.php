<?php

namespace App\Services;

use App\Mail\ForgotPasswordMail;
use App\Mail\VerifyMail;
use App\Model\User;
use App\Repositories\BaseRepository;
use Exception;
use Log;
use Mail;

class AuthService
{
    /**
     * @var BaseRepository
     */
    protected $repository;

    public function __construct()
    {
        $this->repository = app('base_repository');
    }

    public function registerUser($params)
    {
        try {
            User::create($params);

            if (!$this->sendMail($params['email'])) {
                return [true, trans('messages.send_mail_register_failed')];
            }

            return [true, trans('messages.register_success')];
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return [false, trans('messages.register_failed')];
        }
    }

    public function sendMail($email, $uri = null)
    {
        $user = $this->repository->findObject(User::all(), 'email', $email);

        if (!empty($user)) {
            if (strpos($uri, 'forgot-password')) {
                $mailable = new ForgotPasswordMail($user);
            } else {
                $mailable = new VerifyMail($user);
            }

            try {
                Mail::to($user->email)->send($mailable);

                return true;
            } catch (Exception $exception) {
                Log::error($exception);

                return false;
            }
        }

        return false;
    }

    public function decodeToken($verifyToken)
    {
        $tokenExplode = explode('.', $verifyToken);
        $email = base64_decode($tokenExplode[0]);
        $dateTime = base64_decode($tokenExplode[1]);

        return [$email, $dateTime];
    }

    public function verifyAccount($email)
    {
        $user = $this->repository->findObject(User::all(), 'email', $email);

        if (!empty($user)) {
            try {
                $user->update([
                    'verify_at' => now(),
                ]);

                return true;
            } catch (Exception $e) {
                Log::error($e->getMessage());

                return false;
            }
        }

        return false;
    }

    public function updateNewToken($email)
    {
        $user = $this->repository->findObject(User::all(), 'email', $email);

        if (!empty($user)) {
            try {
                $user->update(['email' => $email]);

                if ($this->sendMail($email)) {
                    return trans('messages.expired_send_mail');
                }

                return trans('messages.expired_not_send_mail');
            } catch (Exception $e) {
                Log::error($e->getMessage());

                return trans('messages.errors');
            }
        }

        return trans('messages.errors');
    }

    public function resetPassword($params)
    {
        $email = $this->decodeToken($params['token'])[0];

        $user = $this->repository->findObject(User::all(), 'email', $email);

        if (!empty($user)) {
            try {
                $user->update($params);

                return true;
            } catch (Exception $e) {
                Log::error($e->getMessage());

                return false;
            }
        }

        return false;
    }
}
