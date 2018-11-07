<?php

namespace Programadoramauri\Marvelapi\Rules;

use Illuminate\Contracts\Validation\Rule;

class Daterange implements Rule
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
        $dates = collect(explode(',', $value));
        $dateRange = $dates->map(function($value){
            return trim($dateRange);
        });

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
