<?php

namespace App\Domain\Auth;

use App\Domain\User\Exception\AuthenticationException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class AuthLibrary
{
    const CLIENT_ID_USER_PASSWORD = '9a64535a-d6fa-4ca2-b78a-98108df160a0';
    const CLIENT_ID_PERSONAL_ACCESS = '9a64535a-d0c7-43e8-a71e-7db7f312a940';

    protected $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }

    public function login($email, $password)
    {
        $client = [
            'client_id' => config('passport.user_password_client.id'),
            'client_secret' => config('passport.user_password_client.secret'),
        ];

        return $this->doLogin($client, $email, $password, 'user');
    }

    protected function doLogin($client, $email, $password, $scope)
    {
        return $this->withErrorHandling(function () use ($client, $email, $password, $scope) {
            $response = $this->http->post(config('passport.oauth_token_url'), [
                'form_params' => array_merge(
                    $client,
                    [
                        'grant_type' => 'password',
                        'username' => $email,
                        'password' => $password,
                        'scope' => '*'
                    ]
                ),
            ]);


            return $this->convertResponse($response);
        });
    }

    public function refresh($token)
    {
        return $this->withErrorHandling(function () use ($token) {
            $response = $this->http->post(config('passport.oauth_token_url'), [
                'form_params' => array_merge(
                    $this->getDefaultPayload(),
                    [
                        'grant_type' => 'refresh_token',
                        'refresh_token' => $token,
                    ]
                ),
            ]);

            return $this->convertResponse($response);
        });
    }

    protected function withErrorHandling($callback)
    {
        try {
            return $callback();
        } catch (ClientException $exception) {
            throw new AuthenticationException();
        }
    }

    protected function convertResponse(ResponseInterface $response)
    {
        return json_decode((string)$response->getBody(), true);
    }
}
