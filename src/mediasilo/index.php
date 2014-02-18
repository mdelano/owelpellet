<?php

namespace mediasilo;

require '../../vendor/autoload.php';

use mediasilo\TrackedEvent;

$trackedEvent = new TrackedEvent("TYPE", null);
echo $trackedEvent->toJson();;