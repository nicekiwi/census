<?php

return [
    'service_id' => env('CENSUS_SERVICE_ID'),
    'api_endpoint' => env('CENSUS_API_ENDPOINT', 'census.daybreakgames.com'),
    'stream_endpoint' => env('CENSUS_STREAM_ENDPOINT', 'push.planetside2.com'),
];
