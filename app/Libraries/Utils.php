<?php 

namespace App\Libraries;

use DateTime;

class Utils {
    public static function u_DateTime($datetime)
    {
        $date = new DateTime($datetime);
        $date_formated = $date->format('d F Y H:i');

        return $date_formated;
    }

    public static function u_Date($datetime)
    {
        $date = new DateTime($datetime);
        $date_formated = $date->format('d F Y');

        return $date_formated;
    }

    public static function u_Price($number)
    {
        return '$ ' . number_format(intval($number), 0, ',', '.');
    }
}
