<?php

declare(strict_types=1);

namespace App\Domains\Auth\Jobs;

use App\Data\Models\User;
use Illuminate\Support\Facades\Hash;
use Lucid\Units\Job;

class RegistrationJob extends Job
{
    private string $name;
    private string $email;
    private string $password;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function handle()
    {
        $user = new User();
        $user->setName($this->name)
            ->setEmail($this->email)
            ->setPassword(Hash::make($this->password))
            ->save();
        return $user;
    }
}
