<?php 

namespace App\Libraries;

class Status {
    public static function GetStatus($status)
    {
        switch ($status) {
            case 1:
                $getStatus = 'Active';
                $badge = 'success';
                break;

            case 0:
                $getStatus = 'Not Active';
                $badge = 'danger';
                break;  
                
            default:
                $getStatus = 'Undefined';
                $badge = 'secondary';
                break;
        }

        return '<label class="badge badge-' . $badge . '">' . $getStatus . '</label>';
    }
}
