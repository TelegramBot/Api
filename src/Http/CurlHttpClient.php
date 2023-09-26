<?php

namespace TelegramBot\Api\Http;

use TelegramBot\Api\HttpException;
use TelegramBot\Api\InvalidJsonException;

class CurlHttpClient extends AbstractHttpClient
{
    /**
     * HTTP codes
     *
     * @var array
     */
    private static $codes = [
        // Informational 1xx
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',            // RFC2518
        // Success 2xx
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',          // RFC4918
        208 => 'Already Reported',      // RFC5842
        226 => 'IM Used',               // RFC3229
        // Redirection 3xx
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found', // 1.1
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        // 306 is deprecated but reserved
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',    // RFC7238
        // Client Error 4xx
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Payload Too Large',
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        422 => 'Unprocessable Entity',                                        // RFC4918
        423 => 'Locked',                                                      // RFC4918
        424 => 'Failed Dependency',                                           // RFC4918
        425 => 'Reserved for WebDAV advanced collections expired proposal',   // RFC2817
        426 => 'Upgrade Required',                                            // RFC2817
        428 => 'Precondition Required',                                       // RFC6585
        429 => 'Too Many Requests',                                           // RFC6585
        431 => 'Request Header Fields Too Large',                             // RFC6585
        // Server Error 5xx
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates (Experimental)',                      // RFC2295
        507 => 'Insufficient Storage',                                        // RFC4918
        508 => 'Loop Detected',                                               // RFC5842
        510 => 'Not Extended',                                                // RFC2774
        511 => 'Network Authentication Required',                             // RFC6585
    ];

    /**
     * Default http status code
     */
    const DEFAULT_STATUS_CODE = 200;

    /**
     * Not Modified http status code
     */
    const NOT_MODIFIED_STATUS_CODE = 304;

    /**
     * CURL object
     *
     * @var resource
     */
    private $curl;

    /**
     * @var array
     */
    private $options;

    public function __construct(array $options = [])
    {
        $this->curl = curl_init();
        $this->options = $options;
    }

    /**
     * @inheritDoc
     */
    protected function doRequest($url, array $data = null)
    {
        $options = $this->options + [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
        ];

        if ($data) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $data;
        }

        return self::jsonValidate($this->execute($options));
    }

    /**
     * @inheritDoc
     */
    protected function doDownload($url)
    {
        $options = [
            CURLOPT_HEADER => false,
            CURLOPT_HTTPGET => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url,
        ];

        return $this->execute($options);
    }

    /**
     * @param array $options
     * @return string
     * @throws HttpException
     */
    private function execute(array $options)
    {
        curl_setopt_array($this->curl, $options);

        /** @var string|false $result */
        $result = curl_exec($this->curl);
        if ($result === false) {
            throw new HttpException(curl_error($this->curl), curl_errno($this->curl));
        }

        self::curlValidate($this->curl, $result);

        return $result;
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

    /**
     * @param resource $curl
     * @param string|null $response
     * @return void
     * @throws HttpException
     */
    private static function curlValidate($curl, $response = null)
    {
        $json = json_decode((string) $response, true) ?: [];

        if (($httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE))
            && !in_array($httpCode, [self::DEFAULT_STATUS_CODE, self::NOT_MODIFIED_STATUS_CODE])
        ) {
            $errorDescription = array_key_exists('description', $json) ? $json['description'] : self::$codes[$httpCode];
            $errorParameters = array_key_exists('parameters', $json) ? $json['parameters'] : [];

            throw new HttpException($errorDescription, $httpCode, null, $errorParameters);
        }
    }

    /**
     * Enable proxy for curl requests. Empty string will disable proxy.
     *
     * @param string $proxyString
     * @param bool $socks5
     * @return void
     */
    public function setProxy($proxyString = '', $socks5 = false)
    {
        if (empty($proxyString)) {
            unset($this->options[CURLOPT_PROXY], $this->options[CURLOPT_HTTPPROXYTUNNEL], $this->options[CURLOPT_PROXYTYPE]);

            return;
        }

        $this->options[CURLOPT_PROXY] = $proxyString;
        $this->options[CURLOPT_HTTPPROXYTUNNEL] = true;

        if ($socks5) {
            $this->options[CURLOPT_PROXYTYPE] = CURLPROXY_SOCKS5;
        }
    }

    /**
     * @param string $option
     * @param string|int|bool $value
     * @return void
     */
    public function setOption($option, $value)
    {
        $this->options[$option] = $value;
    }

    /**
     * @param string $option
     * @return void
     */
    public function unsetOption($option)
    {
        unset($this->options[$option]);
    }

    /**
     * @return void
     */
    public function resetOptions()
    {
        $this->options = [];
    }
}
