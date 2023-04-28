<?php

namespace TelegramBot\Api\Http;

use TelegramBot\Api\Exception;

abstract class AbstractHttpClient implements HttpClientInterface
{
    public function request($url, array $data = null)
    {
        $response = $this->doRequest($url, $data);

        if (!isset($response['ok']) || !$response['ok']) {
            throw new Exception($response['description'], $response['error_code']);
        }

        return $response['result'];
    }

    public function download($url)
    {
        return $this->doDownload($url);
    }

    /**
     * @param string $url
     * @param array|null $data
     * @return array
     */
    abstract protected function doRequest($url, array $data = null);

    /**
     * @param string $url
     * @return string
     */
    abstract protected function doDownload($url);
}
