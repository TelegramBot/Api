<?php

namespace TelegramBot\Api\Http;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
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

    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    public function __construct(
        ClientInterface $http,
        RequestFactoryInterface $requestFactory,
        StreamFactoryInterface $streamFactory
    ) {
        $this->http = $http;
        $this->requestFactory = $requestFactory;
        $this->streamFactory = $streamFactory;
    }

    /**
     * @inheritDoc
     */
    protected function doRequest($url, array $data = null)
    {
        if ($data) {
            $method = 'POST';
            $data = array_filter($data);
        } else {
            $method = 'GET';
        }

        $request = $this->requestFactory->createRequest($method, $url);
        if ($method === 'POST') {
            $multipart = false;

            /** @var array $data */
            foreach ($data as &$value) {
                if ($value instanceof \CURLFile) {
                    $value = fopen($value->getFilename(), 'r');
                    $multipart = true;
                }
            }
            unset($value);

            if ($multipart) {
                $builder = new MultipartStreamBuilder($this->streamFactory);
                foreach ($data as $name => $value) {
                    $builder->addResource($name, $value);
                }
                $stream = $builder->build();
                $request = $request->withHeader('Content-Type', "multipart/form-data; boundary={$builder->getBoundary()}");
            } else {
                $stream = $this->streamFactory->createStream(http_build_query($data));
                $request = $request->withHeader('Content-Type', 'application/x-www-form-urlencoded');
            }

            $request = $request->withBody($stream);
        }

        try {
            $response = $this->http->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            throw new HttpException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $content = $response->getBody()->getContents();

        $json = self::jsonValidate($content);

        if (!\in_array($response->getStatusCode(), [200, 304])) {
            $errorDescription = array_key_exists('description', $json) ? $json['description'] : $response->getReasonPhrase();
            $errorParameters = array_key_exists('parameters', $json) ? $json['parameters'] : [];

            throw new HttpException($errorDescription, $response->getStatusCode(), null, $errorParameters);
        }

        return $json;
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
