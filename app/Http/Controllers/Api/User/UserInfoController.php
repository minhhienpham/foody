<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Auth;

class UserInfoController extends ApiController
{

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $updatedUser = $request->only(['full_name', 'gender', 'phone', 'email']);
        $user = Auth::user();
        try {
            $user->update($updatedUser);
            return $this->showOne($user, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse(trans('messages.update_user_fail'), Response::HTTP_BAD_REQUEST);
        }
    }
}
