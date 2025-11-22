<?php
/**
 * instantKOM API Example: List Channels
 *
 * This example demonstrates how to retrieve all your messaging channels.
 */

require_once 'config.php';
$config = require 'config.php';

// API endpoint with pagination
$page = 1;
$limit = 10;
$url = $config['base_url'] . "/v1/channels?page=$page&limit=$limit";

// Initialize cURL
$ch = curl_init($url);

// Set cURL options
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $config['api_key'],
    ],
]);

// Execute request
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Handle response
if ($httpCode === 200) {
    $result = json_decode($response, true);

    echo "Channels (Page $page):\n";
    echo str_repeat('=', 50) . "\n";

    foreach ($result['data'] as $channel) {
        echo "ID: {$channel['id']}\n";
        echo "Name: {$channel['name']}\n";
        echo "Type: {$channel['type']}\n";
        echo "Status: " . ($channel['status'] ? 'Active' : 'Inactive') . "\n";
        echo str_repeat('-', 50) . "\n";
    }

    // Pagination info
    if (isset($result['meta'])) {
        echo "\nTotal: {$result['meta']['total']}\n";
        echo "Pages: {$result['meta']['totalPages']}\n";
    }
} else {
    echo "Error retrieving channels (HTTP $httpCode)\n";
    echo $response . "\n";
}
