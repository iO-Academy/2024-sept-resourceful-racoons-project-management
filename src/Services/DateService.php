<?php

class DateService
{
    public static function isOverdue(?string $date): bool
    {
        if (is_null($date)) {
            return false;
        }

        $todaysDate = date('Y-m-d');

        if ($todaysDate > $date) {
            return true;
        }

        return false;
    }
}