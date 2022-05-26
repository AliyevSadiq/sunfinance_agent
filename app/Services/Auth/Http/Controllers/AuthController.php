<?php

namespace App\Services\Auth\Http\Controllers;

use App\Services\Auth\Features\LoginFeature;
use App\Services\Auth\Features\LogoutFeature;
use App\Services\Auth\Features\RegistrationFeature;
use App\Traits\WithTransaction;
use Lucid\Units\Controller;

class AuthController extends Controller
{

    use WithTransaction;

    /**
     * @OA\Post(
     *      path="/api/auth/register",
     *      operationId="Registration user",
     *      tags={"Auth user"},
     *      summary="Auth user",
     *      description="Returns user data and token",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UserRegistrationRequest"),
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(type="object")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(type="object")
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function register()
    {
        return $this->serveFeature(RegistrationFeature::class);
    }

    /**
     * @OA\Post(
     *      path="/api/auth/login",
     *      operationId="Login user",
     *      tags={"Auth user"},
     *      summary="Auth user",
     *      description="Returns user data and token",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UserLoginRequest"),
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(type="object")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(type="object")
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function login()
    {
        return $this->serveFeature(LoginFeature::class);
    }

    /**
     * @OA\Post(
     *      path="/api/auth/logout",
     *      operationId="Logout user",
     *      tags={"Auth user"},
     *      summary="Logout user",
     *      description="Logout user",
     *      security={{"bearerAuth":{}}},
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(type="object")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function logout()
    {
        return $this->serveFeature(LogoutFeature::class);
    }

}
