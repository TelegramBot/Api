<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ChatInviteLink
 * Represents an invite link for a chat
 *
 * @package TelegramBot\Api\Types
 */
class ChatInviteLink extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = [
        'invite_link',
        'creator',
        'creates_join_request',
        'is_primary',
        'is_revoked',
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'invite_link' => true,
        'creator' => User::class,
        'creates_join_request' => true,
        'is_primary' => true,
        'is_revoked' => true,
        'name' => true,
        'expire_date' => true,
        'member_limit' => true,
        'pending_join_request_count' => true,
    ];

    /**
     * The invite link. If the link was created by another chat administrator,
     * then the second part of the link will be replaced with “…”.
     *
     * @var string
     */
    protected $invite_link;

    /**
     * Creator of the link
     *
     * @var User
     */
    protected $creator;

    /**
     * True, if users joining the chat via the link need to be approved by chat administrators
     *
     * @var boolean
     */
    protected $creates_join_request;

    /**
     * True, if the link is primary
     *
     * @var boolean
     */
    protected $is_primary;

    /**
     * True, if the link is revoked
     *
     * @var boolean
     */
    protected $is_revoked;

    /**
     * Optional. Invite link name
     *
     * @var string
     */
    protected $name;

    /**
     * Optional. Point in time (Unix timestamp) when the link will expire or has been expired
     *
     * @var integer
     */
    protected $expire_date;

    /**
     * @return string
     */
    public function getInviteLink()
    {
        return $this->invite_link;
    }

    /**
     * @param string $invite_link
     */
    public function setInviteLink($invite_link)
    {
        $this->invite_link = $invite_link;
    }

    /**
     * @return User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param User $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return bool
     */
    public function isCreatesJoinRequest()
    {
        return $this->creates_join_request;
    }

    /**
     * @param bool $creates_join_request
     */
    public function setCreatesJoinRequest($creates_join_request)
    {
        $this->creates_join_request = $creates_join_request;
    }

    /**
     * @return bool
     */
    public function isIsPrimary()
    {
        return $this->is_primary;
    }

    /**
     * @param bool $is_primary
     */
    public function setIsPrimary($is_primary)
    {
        $this->is_primary = $is_primary;
    }

    /**
     * @return bool
     */
    public function isIsRevoked()
    {
        return $this->is_revoked;
    }

    /**
     * @param bool $is_revoked
     */
    public function setIsRevoked($is_revoked)
    {
        $this->is_revoked = $is_revoked;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getExpireDate()
    {
        return $this->expire_date;
    }

    /**
     * @param int $expire_date
     */
    public function setExpireDate($expire_date)
    {
        $this->expire_date = $expire_date;
    }

    /**
     * @return int
     */
    public function getMemberLimit()
    {
        return $this->member_limit;
    }

    /**
     * @param int $member_limit
     */
    public function setMemberLimit($member_limit)
    {
        $this->member_limit = $member_limit;
    }

    /**
     * @return int
     */
    public function getPendingJoinRequestCount()
    {
        return $this->pending_join_request_count;
    }

    /**
     * @param int $pending_join_request_count
     */
    public function setPendingJoinRequestCount($pending_join_request_count)
    {
        $this->pending_join_request_count = $pending_join_request_count;
    }

    /**
     * Optional. Maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
     *
     * @var integer
     */
    protected $member_limit;

    /**
     * Optional. Number of pending join requests created using this link
     *
     * @var integer
     */
    protected $pending_join_request_count;

}
