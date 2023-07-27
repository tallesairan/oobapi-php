<?php

require '../vendor/autoload.php';
use Airan\OobApi\StreamClient;

// Create an instance of the WebSocket client
$webSocketBaseUrl = 'ws://example.com'; // Replace with your WebSocket endpoint
$webSocketClient = new StreamClient($webSocketBaseUrl);

// Example usage of the WebSocket client for /api/v1/stream endpoint
$prompt = "Hello, ";
$params = [
    'max_new_tokens' => 50,
    'temperature' => 0.7,
    // Add other parameters as needed
];

$response = $webSocketClient->stream($prompt, $params);

// Validate the response (you can add more advanced validation logic in the validateResponse() method)
if (!isset($response['error'])) {
    // Process the WebSocket response
    // ...
} else {
    // Handle WebSocket error
    echo 'WebSocket Error: ' . $response['error'];
}
