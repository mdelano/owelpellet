<?php

namespace mediasilo\visitor;

class Visitor {

    public $id;
    public $email;
    public $mediasiloId;

    public function __construct() {
        $this->id = VisitorManager::getUvCookie();
        $this->email = VisitorManager::getEmailAddress();
        $this->mediasiloId = VisitorManager::getUserId();
    }

    function toJson() {
        return json_encode($this);
    }

    public static function fromJson($json) {
        $mixed = json_decode($json);
        $visitor = new Visitor();

        $visitor->id = $mixed->id;
        $visitor->email = $mixed->email;
        $visitor->mediasiloId = $mixed->mediasiloId;
    }
}