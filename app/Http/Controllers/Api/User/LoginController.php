<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

class LoginController extends ApiController
{
    /**
     * Login as user
     *
     * @return json authentication code
     */
    public function login()
    {
        if (Auth::attempt(['username' => request('username'), 'password' => request('password')])) {
            $user = Auth::user();
            $data['token'] =  $user->createToken('token')->accessToken;
            $data['user'] = $user;
            return $this->successResponse($data, Response::HTTP_OK);
        } else {
            return $this->errorResponse(config('define.login.unauthorised'), Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Logout
     *
     * @return 204
     */
    public function logout()
    {
        $user = Auth::user();
        $accessToken = $user->token();
        $accessToken->revoke();
        return $this->successResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Register user
     *
     * @param App\Http\Requests\RegisterRequest $request validated request
     *
     * @return json authentication code with user info
     */
    public function register(RegisterRequest $request)
    {
        $input = $request->except('password');
        $input['password'] = bcrypt($request->password);
        $user = User::create($input);
        $data['token'] =  $user->createToken('token')->accessToken;
        $data['user'] =  $user;
        return $this->successResponse($data, Response::HTTP_OK);
    }

    /**
     * Check login token api
     *
     * @return \Illuminate\Http\Response
     */
    public function checkLoginToken()
    {
        if (Auth::user()) {
            $user = Auth::user();
            return $this->successResponse($user, Response::HTTP_OK);
        }
    }

    /**
     * Login as user
     *
     *@param Illuminate\Http\Request $request Request
     *
     * @return json authentication code
     */
    public function loginGplus(Request $request)
    {
        $user = User::firstOrNew([
            'email' => $request->email,
            'gplus_id' => $request->gplus_id
        ]);
        if (!$user->exists) {
            $user->username = $request->username;
            $user->full_name = $request->full_name;
            $user->birthday = '1996-11-16';
            $user->gender = 1;
            $user->phone = 'not found';
            $user->password = bcrypt('12345678');
            $user->gplus_id = $request->gplus_id;
            $user->role_id = 3;
        }
        if ($user->save()) {
            $data['token'] =  $user->createToken('token')->accessToken;
            $data['user'] =  $user;
            return $this->successResponse($data, Response::HTTP_OK);
        }
        return $this->errorResponse(config('define.login.unauthorised'), Response::HTTP_UNAUTHORIZED);
    }
}
