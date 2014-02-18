<?php

namespace mediasilo\request;

use mediasilo\request\RequestManager;

class Resource {

    public $resourceHost;
    public $resourcePath;

    public function __construct() {
        $this->resourceHost = RequestManager::getResourceHost();
        $this->resourcePath = RequestManager::getResourcePath();
    }

    function toJson() {
        return json_encode($this);
    }

    public static function fromJson($json) {
        $mixed = json_decode($json);
        $resource = new Resource();

        $resource->resourcePath = $mixed->resourcePath;
        $resource->resourceHost = $mixed->resourceHost;
    }
}