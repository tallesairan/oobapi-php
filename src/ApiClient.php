<?php

namespace Airan\OobApi;

use GuzzleHttp\Client as HttpClient;

class ApiClient
{
    /**
     * @var
     */
    private $baseUrl;

    /**
     * @param $baseUrl
     */
    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param $method
     * @param $endpoint
     * @param $data
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function sendRequest($method, $endpoint, $data = [])
    {
        $client = new HttpClient(['base_uri' => $this->baseUrl]);

        try {
            $response = $client->request($method, $endpoint, ['json' => $data]);
            $responseData = json_decode($response->getBody(), true);
            return $responseData;
        } catch (\Exception $e) {
            return ['error' => true, 'message' => $e->getMessage(), 'code' => $e->getCode() ?? 500];
        }
    }

    /**
     * @param $baseUrl
     * @return void
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    // Method for /api/v1/generate endpoint

    /**
     * @param $prompt
     * @param $params
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function generate($prompt, $params = [])
    {
        $endpoint = '/api/v1/generate';
        $data = ['prompt' => $prompt] + $params;

        return $this->sendRequest('POST', $endpoint, $data);
    }


    /**
     * @param $userInput
     * @param $history
     * @param $params
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function chat($userInput, $history, $params = [])
    {
        $endpoint = '/api/v1/chat';
        $data = [
                'user_input' => $userInput,
                'history' => $history
            ] + $params;

        return $this->sendRequest('POST', $endpoint, $data);
    }


    /**
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function stopStream()
    {
        $endpoint = '/api/v1/stop-stream';

        return $this->sendRequest('POST', $endpoint);
    }


    /**
     * @param $response
     * @return void
     */
    private function validateResponse($response)
    {
        // Implement your advanced response validation logic here
        // Example: Check if the response format is as expected and contains required fields.
        // ...

        return $response;
    }
}
