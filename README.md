oobapi-php Documentation
========================
### PHP Wrapper for oobabooga's text-generation-webui
This is a PHP client for interacting with WebSocket and HTTP endpoints of the Text Generation API.
The client allows you to send requests to the server and receive responses from the WebSocket and HTTP endpoints.


This documentation provides information about the `oobapi-php` library, a PHP wrapper for oobabooga's text-generation-webui. The library consists of two main classes, `ApiClient` and `StreamClient`, each responsible for interacting with different API endpoints.

Table of Contents
-----------------

-   [Installation](#installation)
-   [ApiClient](#apiclient)
    -   [Constructor](#constructor)
    -   [Methods](#methods)
        -   [generate](#generate)
        -   [chat](#chat)
        -   [stopStream](#stopstream)
-   [StreamClient](#streamclient)
    -   [Constructor](#constructor-1)
    -   [Methods](#methods-1)
        -   [stream](#stream)
        -   [chatStream](#chatstream)

Installation
------------

To use the `oobapi-php` library, you need to have PHP 7.4 or later installed. Additionally, the library depends on the following packages:

-   `guzzlehttp/guzzle` version 7.0 or later
-   `textalk/websocket` version 1.6.1 or later

You can install the library via Composer. Add the following to your `composer.json` file and run `composer install`:

### Requirements

-   PHP 7.4 or higher
-   Composer



```bash
composer require tallesairan/oobapi-php
```



ApiClient
---------

The `ApiClient` class allows you to interact with the oobabooga's text-generation-webui API using HTTP requests.

### Constructor

Create a new `ApiClient` instance by providing the base URL for the API:

```php
use Airan\OobApi\ApiClient;

$baseUrl = 'http://example.com'; // Replace with your API base URL
$apiClient = new ApiClient($baseUrl);
```

### Methods

#### generate

Generate text based on a given prompt and optional parameters.

```php
/**
* Generate text based on a given prompt and optional parameters.
*
* @param string $prompt The input prompt for text generation.
* @param array $params Optional parameters to customize text generation.
* @return array An array containing the generated text and additional data.
  */
  public function generate($prompt, $params = []) {
  // Implementation details...
  }
  ```

#### chat

Chat with the API to generate interactive text based on user input and history.

```php
/**
* Chat with the API to generate interactive text based on user input and history.
*
* @param string $userInput The user's input text.
* @param string $history The conversation history.
* @param array $params Optional parameters to customize the chat.
* @return array An array containing the generated response and additional data.
  */
  public function chat($userInput, $history, $params = []) {
  // Implementation details...
  }
```

#### stopStream

Stop the text generation stream.



```php
/**
* Stop the text generation stream.
*
* @return array An array containing the response data.
  */
  public function stopStream() {
  // Implementation details...
  }
```

StreamClient
------------

* Take careful this is under development


The `StreamClient` class enables you to interact with the oobabooga's text-generation-webui API using WebSocket.

### Constructor

Create a new `StreamClient` instance by providing the WebSocket base URL:



```php
use Airan\OobApi\StreamClient;

$webSocketBaseUrl = 'ws://example.com'; // Replace with your WebSocket base URL
$streamClient = new StreamClient($webSocketBaseUrl);
```

### Methods

#### stream

Generate text using WebSocket streaming based on a given prompt and optional parameters.

```php
/**
* Generate text using WebSocket streaming based on a given prompt and optional parameters.
*
* @param string $prompt The input prompt for text generation.
* @param array $params Optional parameters to customize text generation.
* @return array An array containing the generated text and additional data.
  */
  public function stream($prompt, $params = []) {
  // Implementation details...
  }
  ```


#### chatStream

Chat using WebSocket streaming to generate interactive text based on user input and history.



```php
/**
* Chat using WebSocket streaming to generate interactive text based on user input and history.
*
* @param string $userInput The user's input text.
* @param string $history The conversation history.
* @param array $params Optional parameters to customize the chat.
* @return array An array containing the generated response and additional data.
  */
  public function chatStream($userInput, $history, $params = []) {
  // Implementation details...
  }
  ```
Please note that the above documentation provides a general overview of the `oobapi-php` library and its main classes. For more specific implementation details and usage examples, refer to the source code and documentation of the library itself.


### Contributions
Contributions are welcome! If you find any issues or want to improve the client, feel free to open a pull request.

### License
This project is licensed under the MIT License. See the LICENSE file for details.

Please make sure to adjust the WebSocket and HTTP endpoint URLs in the Usage section to match the actual implementation of your WebSocket and HTTP servers.
Also, update the WebSocket and HTTP server information in the WebSocket Server and HTTP Server sections accordingly.
