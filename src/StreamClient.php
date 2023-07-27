<?php

namespace Airan\OobApi;

use GuzzleHttp\Client as HttpClient;
use WebSocket\Client as WebSocketClient;

/**
 *
 */
class StreamClient
{
    /**
     * @var WebSocketClient
     */
    private WebSocketClient $webSocket;

    /**
     * @param $baseUrl
     */
    public function __construct($baseUrl)
    {
        $this->webSocket = new WebSocketClient($baseUrl);
    }

    /**
     * @param $path
     * @param $data
     * @return mixed
     * @throws \WebSocket\BadOpcodeException
     */
    public function sendRequest($path, $data)
    {
        $requestData = json_encode($data);
        $this->webSocket->send($requestData);

        $response = $this->webSocket->receive();
        return json_decode($response, true);
    }

    /**
     * @param $prompt
     * @param $params
     * @return mixed
     * @throws \WebSocket\BadOpcodeException
     */
    public function stream($prompt, $params = [])
    {
        $endpoint = '/api/v1/stream'; // Replace with your WebSocket endpoint
        $data = ['prompt' => $prompt] + $params;

        return $this->sendRequest($endpoint, $data);
    }


    /**
     * @param $userInput
     * @param $history
     * @param $params
     * @return mixed
     * @throws \WebSocket\BadOpcodeException
     */
    public function chatStream($userInput, $history, $params = [])
    {
        $endpoint = '/api/v1/chat-stream'; // Replace with your WebSocket endpoint
        $data = [
                'user_input' => $userInput,
                'history' => $history
            ] + $params;

        return $this->sendRequest($endpoint, $data);
    }

}
