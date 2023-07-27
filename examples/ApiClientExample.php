<?php
require 'vendor/autoload.php';

use Airan\OobApi\ApiClient;

// Create an instance of the API client
$apiBaseUrl = 'http://example.com'; // Replace with the base URL of your API
$apiClient = new ApiClient($apiBaseUrl);

// Example usage of the /api/v1/generate endpoint
$prompt = "Hello, ";
$params = [
    'max_new_tokens' => 50,
    'temperature' => 0.7,
    // Add other parameters as needed
];

$response = $apiClient->generate($prompt, $params);

// Validate the response (you can add more advanced validation logic in the validateResponse() method)
if (!isset($response['error'])) {
    // Process the API response
    // ...
} else {
    // Handle API error
    echo 'API Error: ' . $response['error'];
}
