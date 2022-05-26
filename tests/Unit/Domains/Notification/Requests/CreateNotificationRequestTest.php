<?php

namespace Tests\Unit\Domains\Notification\Requests;

use App\Data\Models\Client;
use App\Domains\Notification\Requests\CreateNotificationRequest;
use App\Services\Notification\Enums\NotificationChannels;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\Validator;
use Tests\TestCase;

class CreateNotificationRequestTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @var CreateNotificationRequest */
    private $rules;

    /** @var Validator */
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = app()->get('validator');
        $this->rules = (new CreateNotificationRequest())->rules();
    }

    public function validationProvider()
    {
        $faker = Factory::create(Factory::DEFAULT_LOCALE);


        return [
            'request_should_fail_when_no_notification_is_provided' => [
                'passed' => false,
                [
                    'notification' => []
                ]
            ],
            'request_should_fail_when_notification_is_not_array' => [
                'passed' => false,
                [
                    'notification' => ''
                ]
            ],
            'request_should_fail_when_no_clientId_is_provided' => [
                'passed' => false,
                [
                    'notification' => [
                        'clientId' => null,

                    ]
                ]
            ],
            'request_should_fail_when_no_channel_is_provided' => [
                'passed' => false,
                [
                    'notification' => [
                        'channel' => null
                    ]
                ]
            ],
            'request_should_fail_when_channel_type_is_invalid' => [
                'passed' => false,
                [
                    'notification' => [
                        'channel' => $faker->numberBetween(10, 20)
                    ]
                ]
            ],
            'request_should_fail_when_no_content_is_provided' => [
                'passed' => false,
                [
                    'notification' => [
                        'content' => ''
                    ]
                ]
            ],

        ];
    }

    /**
     * @test
     */
    public function request_should_failed_when_client_id_invalid()
    {
        $this->validation_results_as_expected(false, [
            'notification' => [
                [
                    'clientId' => 1,
                    'channel' => NotificationChannels::EMAIL,
                    'content' => $this->faker->paragraph
                ]
            ]
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
        return $this->validator->make($mockedRequestData, $this->rules)->passes();
    }

    /**
     * @test
     */
    public function request_should_pass_when_all_rules_valid()
    {
        $client = Client::factory()->create()->first();

        $this->validation_results_as_expected(true, [
            'notification' => [
                [
                    'clientId' => $client->id,
                    'channel' => NotificationChannels::EMAIL,
                    'content' => $this->faker->paragraph
                ]
            ]
        ]);
    }
}
