<?php
/**
 * instantKOM API Example: Create and Send Broadcast
 *
 * This example demonstrates how to create a broadcast campaign
 * and send it to multiple recipients.
 */

require_once 'config.php';
$config = require 'config.php';

// API endpoint
$url = $config['base_url'] . '/v1/broadcasts';

// Broadcast data
$data = [
    'channelId' => 123, // Your channel ID
    'name' => 'Summer Sale 2025',
    'message' => 'Check out our amazing summer sale! 50% off on selected items.',
    'recipients' => [
        '+49151234567890',
        '+49152345678901',
        '+49153456789012',
    ],
    // Optional: Schedule for later
    // 'scheduledAt' => '2025-12-01T10:00:00Z',
];

// Initialize cURL
$ch = curl_init($url);

// Set cURL options
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $config['api_key'],
        'Content-Type: application/json',
    ],
]);

// Execute request
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Handle response
if ($httpCode === 200 || $httpCode === 201) {
    $result = json_decode($response, true);
    echo "Broadcast created successfully!\n";
    echo "Broadcast ID: " . $result['data']['id'] . "\n";
    echo "Status: " . $result['data']['status'] . "\n";
    echo "Recipients: " . count($data['recipients']) . "\n";

    // Now send the broadcast
    $broadcastId = $result['data']['id'];
    $sendUrl = $config['base_url'] . "/v1/broadcasts/$broadcastId/send";

    $ch = curl_init($sendUrl);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $config['api_key'],
        ],
    ]);

    $sendResponse = curl_exec($ch);
    $sendHttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($sendHttpCode === 200) {
        echo "\nBroadcast sent successfully!\n";
    } else {
        echo "\nError sending broadcast (HTTP $sendHttpCode)\n";
        echo $sendResponse . "\n";
    }
} else {
    echo "Error creating broadcast (HTTP $httpCode)\n";
    echo $response . "\n";
}
