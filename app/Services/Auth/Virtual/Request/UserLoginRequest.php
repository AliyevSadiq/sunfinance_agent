<?php

declare(strict_types=1);

namespace App\Services\Auth\Virtual\Request;

/**
 * @OA\Schema(
 *     title="User login",
 *     description="User login",
 *     @OA\Xml(
 *         name="User login"
 *     )
 * )
 */
class UserLoginRequest
{
    /**
     * @OA\Property(
     *      title="User email",
     *      description="User email",
     *      type="string",
     *      example="john.doe@mail.com"
     * )
     */
    public string $email;

    /**
     * @OA\Property(
     *      title="User password",
     *      description="User password",
     *      type="string",
     *      example="12345678"
     * )
     */
    public string $password;
}
