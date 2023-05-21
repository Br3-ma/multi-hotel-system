<?php

namespace App\Traits;

use DateTime;

trait DateTrait {
    public function convertNormal($dateString){
        if (!preg_match('/[-\/]/', $dateString)) {
            $formattedDate = date("Y-m-d", strtotime($dateString));
            return $formattedDate;
        }elseif (strpos($dateString, '-') !== false) {
            return $dateString;
        }else{
            if(strpos($dateString, '/') === false){
                $date = DateTime::createFromFormat('F d, Y', $dateString);
                $formatted_date = $date->format('Y-m-d');
                return $formatted_date; // Output: 2023-05-25
            }else{
                $date = DateTime::createFromFormat('m/d/Y', $dateString);
                $formattedDate = $date->format('Y-m-d');
        
                return $formattedDate; // Output: 2023-03-02
            }
        }
    }

    public function numOfDays($date1, $date2){

        // Convert the dates to DateTime objects
        $dateTime1 = new DateTime($date1);
        $dateTime2 = new DateTime($date2);

        // Calculate the difference between the two dates
        $interval = $dateTime1->diff($dateTime2);

        // Get the total number of days between the two dates
        $days = $interval->days;

        // Output the result
        return $days;
    }

    public function readDate($date){
        // Convert the date to a DateTime object
        $dateTime = new DateTime($date);

        // Format the date in human-readable format
        $formattedDate = $dateTime->format("F j, Y");

        // Output the result
        return $formattedDate;
    }
}