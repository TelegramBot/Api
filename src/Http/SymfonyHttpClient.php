<?php

namespace TelegramBot\Api\Http;

use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
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

            $data = array_filter($data);
            foreach ($data as &$value) {
                if ($value instanceof \CURLFile) {
                    $value = DataPart::fromPath($value->getFilename());
                } elseif (!\is_string($value) && !\is_array($value)) {
                    $value = (string) $value;
                }
            }
            $formData = new FormDataPart($data);

            $options['headers'] = $formData->getPreparedHeaders()->toArray();
            $options['body'] = $formData->toIterable();
        } else {
            $method = 'GET';
        }

        $response = $this->http->request($method, $url, $options);

        try {
            return $response->toArray();
        } catch (ExceptionInterface $exception) {
            if ($exception instanceof HttpExceptionInterface) {
                $response = $exception->getResponse()->toArray(false);
                $message = array_key_exists('description', $response) ? $response['description'] : $exception->getMessage();
                $parameters = array_key_exists('parameters', $response) ? $response['parameters'] : [];
            } else {
                $message = $exception->getMessage();
                $parameters = [];
            }

            throw new HttpException($message, $exception->getCode(), $exception, $parameters);
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
