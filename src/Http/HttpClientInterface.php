<?php

namespace TelegramBot\Api\Http;

use TelegramBot\Api\Exception;
use TelegramBot\Api\HttpException;

interface HttpClientInterface
{
    /**
     * Request url
     *
     * @param string $url
     * @param array|null $data
     * @return mixed
     * @throws Exception
     */
    public function request($url, array $data = null);

    /**
     * Get file contents
     *
     * @param string $url
     *
     * @return string
     *
     * @throws HttpException
     * @throws Exception
     */
    public function download($url);
}
