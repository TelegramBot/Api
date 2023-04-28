<?php

namespace TelegramBot\Api\Http;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use TelegramBot\Api\HttpException;
use TelegramBot\Api\InvalidJsonException;

class PsrHttpClient extends AbstractHttpClient
{
    /**
     * @var ClientInterface
     */
    private $http;

    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;

    public function __construct(ClientInterface $http, RequestFactoryInterface $requestFactory)
    {
        $this->http = $http;
        $this->requestFactory = $requestFactory;
    }

    /**
     * @inheritDoc
     */
    protected function doRequest($url, array $data = null)
    {
        if ($data) {
            $method = 'POST';
        } else {
            $method = 'GET';
        }

        $request = $this->requestFactory->createRequest($method, $url);
        try {
            $response = $this->http->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            throw new HttpException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $content = $response->getBody()->getContents();

        return self::jsonValidate($content);
    }

    /**
     * @inheritDoc
     */
    protected function doDownload($url)
    {
        $request = $this->requestFactory->createRequest('GET', $url);

        try {
            return $this->http->sendRequest($request)->getBody()->getContents();
        } catch (ClientExceptionInterface $exception) {
            throw new HttpException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * @param string $jsonString
     * @return array
     * @throws InvalidJsonException
     */
    private static function jsonValidate($jsonString)
    {
        /** @var array $json */
        $json = json_decode($jsonString, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidJsonException(json_last_error_msg(), json_last_error());
        }

        return $json;
    }
}
