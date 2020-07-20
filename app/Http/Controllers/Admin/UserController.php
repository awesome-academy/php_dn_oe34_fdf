<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Model\User;
use App\Repositories\BaseRepository;
use App\Services\AuthService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var BaseRepository
     */
    protected $repository;
    /**
     * @var AuthService
     */
    protected $authService;

    public function __construct()
    {
        $this->repository = app('base_repository');
        $this->authService = app('auth_service');
    }

    public function listUsers(Request $request)
    {
        $limits = $request->get('limits', config('custom.paginate.limits'));
        $search = $request->get('search', '');
        $searchKey = $request->get('search_key', '');

        $query = User::query();

        $users = $this->repository->listAll($query, $limits, $search, $searchKey);

        return view('admin.users.list', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(RegisterRequest $request)
    {
        $params = $request->except('_token', 'password_confirmation');

        list($status, $message) = $this->authService->registerUser($params);

        if (!$status) {
            return redirect(route('user.list'))->with(['failed' => $message]);
        }

        return redirect(route('user.list'))->with(['success' => $message]);
    }

    public function edit($id)
    {
        $user = $this->repository->findObject(User::all(), 'id', $id);

        if (!empty($user)) {
            return view('admin.users.edit', compact('user'));
        }

        return abort(404);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $params = $request->except('_token', '_method');

        $user = $this->repository->findObject(User::all(), 'id', $id);
        $status = $this->repository->update($user, $params);

        if (!$status) {
            return redirect(route('user.list'))->with(['failed' => trans('messages.update_failed')]);
        }

        return redirect(route('user.list'))->with(['success' => trans('messages.update_success')]);
    }

    public function destroy($id)
    {
        $user = $this->repository->findObject(User::all(), 'id', $id);
        $status = $this->repository->destroy($user);

        if (!$status) {
            return response()->json(trans('messages.delete_failed'));
        }

        return response()->json(trans('messages.delete_success'));
    }
}
