<?php

namespace App\Domains\Auth\Jobs;

use App\Data\Models\User;
use Lucid\Units\Job;

class GetTokenJob extends Job
{
    private User $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function handle(): string
    {
        return $this->user->createToken('auth_token')->plainTextToken;
    }
}
