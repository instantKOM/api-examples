<?php
/**
 * instantKOM API Example: Send Message
 *
 * Sends a 1:1 text message to a recipient by their internal ID.
 * To find the recipient ID, use the contacts endpoint:
 *   GET /v1/contacts?search=<phone_or_name>
 */

require_once 'config.php';
$config = require 'config.php';

// API endpoint
$url = $config['base_url'] . '/v1/messages';

// Message data
$data = [
    'recipientId' => 12345, // Internal instantKOM contact ID (not a phone number)
    'message'     => 'Hello from instantKOM API!',
    'messageType' => 'text',
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
    echo "Message sent successfully!\n";
    echo "Message ID: " . $result['id'] . "\n";
    print_r($result);
} else {
    echo "Error sending message (HTTP $httpCode)\n";
    echo $response . "\n";
}
