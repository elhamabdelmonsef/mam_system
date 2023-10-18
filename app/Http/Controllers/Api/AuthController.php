<?php

namespace App\Http\Controllers\Api;

use App\Domain\Auth\AuthLibrary;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * @var AuthLibrary
     */
    private $authLibrary;

    public function __construct(AuthLibrary $authLibrary)
    {
        $this->authLibrary = $authLibrary;
    }

    public function login(LoginRequest $request)
    {
        $input = $this->getLoginInput($request);

        return $this->authLibrary->login($input['email'], $input['password']);

    }

    protected function getLoginInput(Request $request)
    {
        return $request->get('data')['attributes'];
    }
}
