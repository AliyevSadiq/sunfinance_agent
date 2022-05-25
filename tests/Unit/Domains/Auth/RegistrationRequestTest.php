<?php

namespace Tests\Unit\Domains\Auth;

use App\Data\Models\User;
use App\Domains\Auth\Requests\RegistrationRequest;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\Validator;
use Tests\TestCase;

class RegistrationRequestTest extends TestCase
{

    use WithFaker, RefreshDatabase;

    /** @var RegistrationRequest */
    private $rules;

    /** @var Validator */
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = app()->get('validator');
        $this->rules = (new RegistrationRequest())->rules();
    }

    public function validationProvider()
    {
        $faker = Factory::create(Factory::DEFAULT_LOCALE);
        $password = $faker->password;
        $email = $faker->email;
        $name = $faker->name;

        return [
            'request_should_fail_when_no_name_is_provided' => [
                'passed' => false,
                [
                    'email' => $email,
                    'password' => $password,
                ]
            ],
            'request_should_fail_when_no_email_is_provided' => [
                'passed' => false,
                [
                    'name' => $name,
                    'password' => $password,
                ]
            ],
            'request_should_fail_when_email_format_is_not_valid' => [
                'passed' => false,
                [
                    'name' => $name,
                    'email' => $faker->text,
                    'password' => $password,
                ]
            ],
            'request_should_fail_when_no_password_is_provided' => [
                'passed' => false,
                [
                    'name' => $name,
                    'email' => $email,
                ]
            ],
            'request_should_fail_when_no_password_confirmation_is_provided' => [
                'passed' => false,
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                ]
            ],
            'request_should_pass_when_all_parameter_is_valid' => [
                'passed' => true,
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'password_confirmation' => $password,
                ]
            ]
        ];
    }

    /**
     * @test
     */
    public function request_should_fail_when_email_already_exists()
    {
        $user = User::factory()->create()->first();

        $password = $this->faker->password;

        $this->validation_results_as_expected(false, [
            'name' => $this->faker->name,
            'email' => $user->getEmail(),
            'password' => $password,
            'password_confirmation' => $password,
        ]);
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
