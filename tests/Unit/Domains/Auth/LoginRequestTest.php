<?php

namespace Tests\Unit\Domains\Auth;

use App\Domains\Auth\Requests\LoginRequest;
use Tests\TestCase;
use Faker\Factory;

class LoginRequestTest extends TestCase
{

    /** @var \App\Domains\Auth\Requests\LoginRequest */
    private $rules;

    /** @var \Illuminate\Validation\Validator */
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = app()->get('validator');
        $this->rules = (new LoginRequest())->rules();
    }

    public function validationProvider()
    {
        $faker = Factory::create(Factory::DEFAULT_LOCALE);
        $password = $faker->password;
        $email = $faker->email;

        return [
            'request_should_fail_when_no_email_is_provided' => [
                'passed' => false,
                [
                    'password' => $password,
                ]
            ],
            'request_should_fail_when_email_format_is_not_valid' => [
                'passed' => false,
                [
                    'email' => $faker->text,
                    'password' => $password,
                ]
            ],
            'request_should_fail_when_no_password_is_provided' => [
                'passed' => false,
                [
                    'email' => $email,
                ]
            ],
            'request_should_pass_when_all_parameter_is_valid' => [
                'passed' => true,
                [
                    'email' => $email,
                    'password' => $password,
                ]
            ]
        ];
    }


    /**
     * @test
     * @dataProvider validationProvider
     * @param bool $shouldPass
     * @param array $mockedRequestData
     */
    public function validation_results_as_expected($shouldPass, $mockedRequestData)
    {
        $this->assertEquals(
            $shouldPass,
            $this->validate($mockedRequestData)
        );
    }

    protected function validate($mockedRequestData)
    {
        return $this->validator->make($mockedRequestData, $this->rules)
            ->passes();
    }
}
