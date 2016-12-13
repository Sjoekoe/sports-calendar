<?php
namespace App\Validation;

use DateTime;

class DateTimeValidator
{
    /**
     * @param string $date
     * @param string $format
     * @return bool
     */
    public function validateFormat($date, $format = 'd-m-Y')
    {
        if (DateTime::createFromFormat($format, $date) == false) {
            return false;
        }

        return DateTime::getLastErrors()['warning_count'] === 0;
    }
}
