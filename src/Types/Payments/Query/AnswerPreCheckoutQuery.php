<?php

namespace TelegramBot\Api\Types\Payments\Query;

use TelegramBot\Api\BaseType;

/**
 * Class AnswerPreCheckoutQuery
 * Use this method to respond to such pre-checkout queries.
 *
 * @package TelegramBot\Api\Types\Payments\Query
 */
class AnswerPreCheckoutQuery extends BaseType
{
    /**
     * @var array
     */
    protected static $requiredParams = ['pre_checkout_query_id', 'ok'];

    /**
     * @var array
     */
    protected static $map = [
        'pre_checkout_query_id' => true,
        'ok' => true,
        'error_message' => true,
    ];

    /**
     * Unique identifier for the query to be answered
     *
     * @var string
     */
    protected $preCheckoutQueryId;

    /**
     * Specify True if everything is alright
     *
     * @var bool
     */
    protected $ok;

    /**
     * Error message in human readable form that explains the reason for failure to proceed with the checkout
     *
     * @var string
     */
    protected $errorMessage;

    /**
     * @author MY
     * @return bool
     */
    public function getOk()
    {
        return $this->ok;
    }

    /**
     * @author MY
     *
     * @param bool $ok
     *
     * @return void
     */
    public function setOk($ok)
    {
        $this->ok = $ok;
    }

    /**
     * @author MY
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @author MY
     *
     * @param string $errorMessage
     *
     * @return void
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @author MY
     * @return string
     */
    public function getPreCheckoutQueryId()
    {
        return $this->preCheckoutQueryId;
    }

    /**
     * @author MY
     *
     * @param string $preCheckoutQueryId
     *
     * @return void
     */
    public function setPreCheckoutQueryId($preCheckoutQueryId)
    {
        $this->preCheckoutQueryId = $preCheckoutQueryId;
    }
}
