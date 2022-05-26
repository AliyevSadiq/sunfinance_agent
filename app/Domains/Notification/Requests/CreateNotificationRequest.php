<?php

namespace App\Domains\Notification\Requests;

use App\Rules\ContentLengthRule;
use App\Services\Notification\Enums\NotificationChannels;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateNotificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'notification' => ['required', 'array'],
            'notification.*.clientId' => ['required', 'exists:clients,id'],
            'notification.*.channel' => ['required', Rule::in(NotificationChannels::getValues())],
            'notification.*.content' => ['required', new ContentLengthRule()]
        ];
    }
}
