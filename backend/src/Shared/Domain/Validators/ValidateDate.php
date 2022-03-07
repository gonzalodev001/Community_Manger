<?php

namespace App\Shared\Domain\Validators;

class ValidateDate
{
    public function __construct(private string $date)
    {
    }

    public function date(): string
    {
        return $this->date;
    }

    public static function isValidDate(string $date): bool
    {
        $datetime = explode(' ', $date);

        $dates = explode('-', $datetime[0]);
        if(!count($dates) == 3) return false;

        if(checkdate($dates[1],$dates[2],$dates[0])) {
            return true;
        }
        return false;
    }

    public static function isValidTime(string $date): bool
    {
        $datetime = explode(' ', $date);

        return preg_match("#([0-1]{1}[0-9]{1}|[2]{1}[0-3]{1}):[0-5]{1}[0-9]{1}:[0-5]{1}[0-9]{1}#", $datetime[1]);
    }
}