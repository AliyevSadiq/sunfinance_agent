<?php

declare(strict_types=1);

namespace App\Services\Auth\Virtual\Request;

/**
 * @OA\Schema(
 *     title="User registration",
 *     description="User registration",
 *     @OA\Xml(
 *         name="User registration"
 *     )
 * )
 */
class UserRegistrationRequest
{
    /**
     * @OA\Property(
     *      title="User name",
     *      description="User name",
     *      type="string",
     *      example="John"
     * )
     */
    public string $name;

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

    /**
     * @OA\Property(
     *      title="User password confirmation",
     *      description="User password confirmation",
     *      type="string",
     *      example="12345678"
     * )
     */
    public string $password_confirmation;
}
