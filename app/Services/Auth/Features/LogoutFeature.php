<?php

namespace App\Services\Auth\Features;

use App\Domains\Auth\Jobs\LogoutJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class LogoutFeature extends Feature
{
    public function handle(Request $request)
    {
        $this->run(LogoutJob::class);
        return $this->run(new RespondWithJsonJob([
            'message' => 'successfully logged out'
        ]));
    }
}
