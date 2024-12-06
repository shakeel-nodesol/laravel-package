<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'access_token' => env('FCM_ACCESS_TOKEN'),
        'project_id' => env('FCM_PROJECT_ID', 'your-project-id'),
        'server_send_url' => 'https://fcm.googleapis.com/v1/projects/'.env('FCM_PROJECT_ID', 'your-project-id').'/messages:send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
