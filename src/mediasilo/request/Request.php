<?php

namespace mediasilo\request;

use mediasilo\request\RequestManager;
use mediasilo\request\Resource;

class Request {

    public $ipAddress;
    public $userAgent;
    public $referrer;
    public $resource;

    public function __construct() {
        $this->ipAddress = RequestManager::getClientIp();
        $this->userAgent = RequestManager::getUserAgent();
        $this->referrer = RequestManager::getReferrer();
        $this->resource = new Resource();
    }

    function toJson() {
        return json_encode($this);
    }

    public static function fromJson($json) {
        $mixed = json_decode($json);
        $request = new Request();

        $request->ipAddress = $mixed->ipAddress;
        $request->userAgent = $mixed->userAgent;
        $request->referrer = $mixed->referrer;
        $request->resource = Resource::fromJson($mixed->resource);

        return $request;
    }
}