<?php

namespace App\Traits;

use Aeq\LargestRemainder\Math\LargestRemainder;
use App\Data\Models\User;
use App\Services\User\Enums\UserType;
use Carbon\CarbonImmutable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Validation\ValidationException;

trait Helpers
{
    public function parseTime(string $time, $format = null)
    {
        try {
            $carbon = CarbonImmutable::parse($time);
            return $format ? $carbon->format($format) : $carbon;
        } catch (\Exception $e) {
            throw ValidationException::withMessages(['date format incorrect']);
        }
    }

    public function generateOtpCode(): int
    {
        return rand(1111, 9999);
    }

    public function getOtpExpireTime(): CarbonImmutable
    {
        return CarbonImmutable::now()->addMinutes(config('auth.otp_expire_time'));
    }

    public function safeCall($callback)
    {
        try {
            return $callback();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function authUser(): Authenticatable
    {
        return auth('sanctum')->user();
    }

    public function isAdmin(): bool
    {
        return $this->authUser()->type == UserType::ADMIN;
    }

    public function userIs(int $user_type): bool
    {
        return $this->authUser()->type == $user_type;
    }

    public function getPercentOfNumber(int $current, int $total)
    {
        if (!$current || !$total) {
            return 0;
        }
        return round(($current * 100) / $total);
    }

    public function normalizePercents(array $numbers): array
    {
        $lr = new LargestRemainder($numbers);
        return $lr->round();

    }
}
