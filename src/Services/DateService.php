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
    public static function dateFormat(TaskEntity $task): string
    {
        if (!$task->deadline) {
            return "N/A";
        }
        $timestamp = strtotime($task->deadline);
        $formattedDate = date('d-m-Y', $timestamp);
        return $formattedDate;
    }
}