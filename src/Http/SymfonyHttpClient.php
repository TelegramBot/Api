<?php

namespace TelegramBot\Api\Http;

use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface as SymfonyHttpClientInterface;
use TelegramBot\Api\HttpException;

class SymfonyHttpClient extends AbstractHttpClient
{
    /**
     * @var SymfonyHttpClientInterface
     */
    private $http;

    public function __construct(SymfonyHttpClientInterface $http)
    {
        $this->http = $http;
    }

    /**
     * @inheritDoc
     */
    protected function doRequest($url, array $data = null)
    {
        $options = [];
        if ($data) {
            $method = 'POST';
            $options['body'] = $data;
        } else {
            $method = 'GET';
        }

        $response = $this->http->request($method, $url, $options);

        try {
            return $response->toArray();
        } catch (ExceptionInterface $exception) {
            throw new HttpException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * @inheritDoc
     */
    protected function doDownload($url)
    {
        try {
            return $this->http->request('GET', $url)->getContent();
        } catch (ExceptionInterface $exception) {
            throw new HttpException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }
}
