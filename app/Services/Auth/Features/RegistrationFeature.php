<?php

declare(strict_types=1);

namespace App\Services\Auth\Features;

use App\Domains\Auth\Jobs\{GetTokenJob, RegistrationJob};
use App\Domains\Auth\Requests\RegistrationRequest;
use App\Http\Resources\UserResource;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class RegistrationFeature extends Feature
{
    public function handle(RegistrationRequest $request)
    {

        $user = $this->run(RegistrationJob::class, [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

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
