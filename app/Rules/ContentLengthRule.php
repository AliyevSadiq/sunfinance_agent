<?php

namespace App\Rules;

use App\Services\Notification\Enums\NotificationChannels;
use Illuminate\Contracts\Validation\Rule;

class ContentLengthRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $key=str_replace('.content','.channel',$attribute);
        return !(request()->input($key) == NotificationChannels::SMS) || strlen($value) <= 140;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
