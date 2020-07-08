@if($user->role_id === \App\Model\Role::$roles['Admin'])
    <a href="{{route('admin.reset_password-form', ['token' => $user->verify_token])}}">{{trans('messages.reset_password_mail_message')}}</a>
@else
    <a href="{{route('user.reset_password-form', ['token' => $user->verify_token])}}">{{trans('messages.reset_password_mail_message')}}</a>
@endif
