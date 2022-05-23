<?php

declare(strict_types=1);

namespace App\Services\Auth\Features;

use App\Domains\Auth\Jobs\{GetTokenJob, GetUserJob};
use App\Domains\Auth\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Lucid\Domains\Http\Jobs\{RespondWithJsonErrorJob, RespondWithJsonJob};
use Lucid\Units\Feature;

class LoginFeature extends Feature
{
    public function handle(LoginRequest $request)
    {
        $user = $this->run(GetUserJob::class, [
            'email' => $request->email
        ]);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->run(new RespondWithJsonErrorJob(["message" => "Invalid User"],
                    Response::HTTP_UNAUTHORIZED,
                    Response::HTTP_UNAUTHORIZED
                )
            );
        }
        $token = $this->run(GetTokenJob::class, [
            'user' => $user
        ]);

        return $this->run(new RespondWithJsonJob([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => new UserResource($user)
        ]));
    }
}
