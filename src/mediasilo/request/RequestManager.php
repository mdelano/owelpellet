<?php

namespace mediasilo\request;

class RequestManager {


    public static function getReferrer() {
        $referrer = "";
        if(isset($_SESSION['referrer'])){
            $referrer   = $_SESSION['referrer'];
        } elseif(isset($_SERVER['HTTP_REFERER'])){
            $referrer   = $_SERVER['HTTP_REFERER'];

        }

        return $referrer;
    }

    public static function getClientIp() {
         $ipAddress = '';
         if (getenv('HTTP_CLIENT_IP'))
             $ipAddress = getenv('HTTP_CLIENT_IP');
         else if(getenv('HTTP_X_FORWARDED_FOR'))
             $ipAddress = getenv('HTTP_X_FORWARDED_FOR'&quot);
         else if(getenv('HTTP_X_FORWARDED'))
             $ipAddress = getenv('HTTP_X_FORWARDED');
         else if(getenv('HTTP_FORWARDED_FOR'))
             $ipAddress = getenv('HTTP_FORWARDED_FOR');
         else if(getenv('HTTP_FORWARDED'))
            $ipAddress = getenv('HTTP_FORWARDED');
         else if(getenv('REMOTE_ADDR'))
             $ipAddress = getenv('REMOTE_ADDR');
         else
             $ipAddress = 'UNKNOWN';

         return $ipAddress;
    }

    public static function getUserAgent() {
        return $_SERVER['HTTP_USER_AGENT'];;
    }

    public static function getResourceHost() {
        return $_SERVER['HTTP_HOST'];
    }

    public static function getResourcePath() {
        return $_SERVER['REQUEST_URI'];
    }
}