<?php

namespace mediasilo\visitor;

class VisitorManager {
    const COOKIE_KEY = "MEDIASILO_ANALYTICS_UV";

    public static function getUvCookie() {
        VisitorManager::trySetCookie();

        return $_COOKIE[VisitorManager::COOKIE_KEY];
    }

    public static function trySetCookie() {
        if(!isset($_COOKIE[VisitorManager::COOKIE_KEY])) {
            setcookie(VisitorManager::COOKIE_KEY, uniqid());
        }
    }

    public static function getUserId() {

    }

    public static function getEmailAddress() {

    }
}