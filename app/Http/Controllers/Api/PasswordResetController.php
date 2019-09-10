<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ValidateTokenRequest;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\PasswordResetRequest;
use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Neomerx\JsonApi\Document\Error;

class PasswordResetController extends JsonApiController
{


    public function request(ForgotPasswordRequest $request)
    {
        $credentials = $request->validated();

        $user = User::whereEmail($credentials['email'])->firstOrFail();

        $email = PasswordReset::where('email', $credentials['email']);
        if ($email) {
            $email->delete();
        }

        $passwordReset = PasswordReset::create([
            'email' => $user->email,
            'token' => Str::random(60),
            'expired_at' => Carbon::now()->addHour(1),
            'created_at' => Carbon::now()
        ]);

        if (!$passwordReset) {
            $error = new Error(null, null, '404', null, 'Login Fail', 'Email or password incorect', null, null);
            $this->reply()->error($error);
        }

        $user->notify(new PasswordResetRequest($passwordReset->token, $credentials['redirectUrl']));
        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ]);
    }

    public function validate($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();

        if (!$passwordReset) {
            return response()->json([
                'message' => 'Token not signed'
            ], 404);
        }

        if (Carbon::now() > Carbon::parse($passwordReset->expired_at)) {
            PasswordReset::where('token', $token)->delete();
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        }

        return response()->json($passwordReset);

    }

    public function reset(ResetPasswordRequest $request)
    {
        $credentials = $request->validated();

        $email = PasswordReset::whereToken($credentials['token'])->firstOrFail();


        $user = User::where('email', $email['email'])->firstOrFail();
        $user->password = bcrypt($request->password);
        $user->save();

        PasswordReset::whereToken($credentials['token'])->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }

}
