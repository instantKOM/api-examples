<?php
/**
 * instantKOM API Example: Create and Send Broadcast
 *
 * Creates a broadcast campaign for all contacts in a channel (or a segment)
 * and sends it immediately.
 *
 * Broadcasts target contacts already stored in instantKOM, not raw phone numbers.
 * Use segmentId to restrict the audience to a specific contact segment.
 */

require_once 'config.php';
$config = require 'config.php';

// Step 1: Create broadcast
$url = $config['base_url'] . '/v1/broadcasts';

$data = [
    'channelId' => 505, // Your channel ID
    'message'   => 'Check out our amazing summer sale! 50% off on selected items.',
    // Optional: restrict to a contact segment
    // 'segmentId' => 123,
    // Optional: schedule for future send (Unix timestamp in seconds)
    // 'scheduledAt' => 1735000000,
];

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $config['api_key'],
        'Content-Type: application/json',
    ],
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200 && $httpCode !== 201) {
    echo "Error creating broadcast (HTTP $httpCode)\n";
    echo $response . "\n";
    exit(1);
}

$result = json_decode($response, true);
$broadcastId = $result['id'];

echo "Broadcast created successfully!\n";
echo "Broadcast ID: $broadcastId\n";
echo "Send status: " . $result['sendStatus'] . "\n";

// Step 2: Send broadcast
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

if ($sendHttpCode === 200 || $sendHttpCode === 201) {
    echo "\nBroadcast sent successfully!\n";
} else {
    echo "\nError sending broadcast (HTTP $sendHttpCode)\n";
    echo $sendResponse . "\n";
}
