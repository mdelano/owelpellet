<?php

namespace mediasilo;

use mediasilo\visitor\Visitor;
use mediasilo\request\Request;

class TrackedEvent {

    public $type;
    public $request;
    public $visitor;
    public $body;
    public $timestamp;

    public function __construct($type, $body) {
        $this->type = $type;
        $this->body = $body;
        $this->timestamp = date("U");

        $this->request = new Request();
        $this->visitor = new Visitor();
    }

    function toJson() {
        return json_encode($this);
    }

    public static function fromJson($json) {
        $mixed = json_decode($json);

        $trackedEvent = new TrackedEvent($mixed->type, $mixed->body);

        $trackedEvent->timestamp = $mixed->timestamp;
        $trackedEvent->body = $mixed->body;

        $request = Request::fromJson($mixed->request);
        $visitor = Visitor::fromJson($mixed->visitor);

        $trackedEvent->request = $request;
        $trackedEvent->visitor = $visitor;
    }

}