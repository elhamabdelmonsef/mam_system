<?php

namespace App\Http\Controllers\Api;

use App\Domain\User\Model\User;
use App\Domain\User\UserLibrary;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    private $userLibrary;

    public function __construct(UserLibrary $userLibrary)
    {
        return $this->userLibrary = $userLibrary;
    }

    public function index(Request $request)
    {
        $paginationInfo = $request->get('page') ?? [];

        return $this->userLibrary->getUsers($paginationInfo);
    }

    public function store(CreateUserRequest $request)
    {
        return $this->userLibrary->createUser($this->parseData($request->all()));
    }

    public function update(Request $request, User $user)
    {
        return $this->userLibrary->updateUser($user, $this->parseData($request->all()));
    }

    public function show(User $user)
    {
        return $user;
    }

    public function destroy(User $user)
    {
        return $this->userLibrary->deleteUser($user);
    }

    private function parseData($data)
    {
        return Arr::get($data, 'data.attributes');
    }
}
