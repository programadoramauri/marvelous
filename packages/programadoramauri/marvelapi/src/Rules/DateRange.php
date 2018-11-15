<?php

namespace Programadoramauri\Marvelapi\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Collection;

class DateRange implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(!$this->validDates($value)){
            return false;
        }

        $dates = collect(explode(',', $value));

        if($dates->count() > 2){
            return false;
        }

        if(!$this->validateRanges($dates)){
            return false;
        }



        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.dateRange');
    }

    private function validDates($value)
    {
        return preg_match('/^([0-9]{4}-(?:0[1-9]|1[0-2])-(?:0[1-9]|[12][0-9]|3[01]))(?:,\s*(?1))*$/', $value);
    }

    private function validateRanges(Collection $value)
    {
        $minDate = Carbon::parse($value[0]);
        $maxDate = Carbon::parse($value[1]);
        return $minDate->lessThan($maxDate);

    }
}
