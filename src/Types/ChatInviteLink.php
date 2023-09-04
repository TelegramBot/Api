<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class ChatInviteLink extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['invite_link', 'creator', 'creates_join_request', 'is_primary', 'is_revoked'];

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
     * The invite link. If the link was created by another chat administrator, then the second part of the link will be replaced with “…”.
     *
     * @var string
     */
    protected $inviteLink;

    /**
     * Creator of the link
     *
     * @var User
     */
    protected $creator;

    /**
     * True, if users joining the chat via the link need to be approved by chat administrators
     *
     * @var bool
     */
    protected $createsJoinRequest;

    /**
     * True, if the link is primary
     *
     * @var bool
     */
    protected $isPrimary;

    /**
     * True, if the link is revoked
     *
     * @var bool
     */
    protected $isRevoked;

    /**
     * Optional. Invite link name
     *
     * @var string|null
     */
    protected $name;

    /**
     * Optional. Point in time (Unix timestamp) when the link will expire or has been expired
     *
     * @var int|null
     */
    protected $expireDate;

    /**
     * Optional. The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
     *
     * @var int|null
     */
    protected $memberLimit;

    /**
     * Optional. Number of pending join requests created using this link
     *
     * @var int|null
     */
    protected $pendingJoinRequestCount;

    /**
     * @return string
     */
    public function getInviteLink()
    {
        return $this->inviteLink;
    }

    /**
     * @param string $inviteLink
     * @return void
     */
    public function setInviteLink($inviteLink)
    {
        $this->inviteLink = $inviteLink;
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
     * @return void
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return bool
     */
    public function getCreatesJoinRequest()
    {
        return $this->createsJoinRequest;
    }

    /**
     * @param bool $createsJoinRequest
     * @return void
     */
    public function setCreatesJoinRequest($createsJoinRequest)
    {
        $this->createsJoinRequest = $createsJoinRequest;
    }

    /**
     * @return bool
     */
    public function isPrimary()
    {
        return $this->isPrimary;
    }

    /**
     * @param bool $isPrimary
     * @return void
     */
    public function setIsPrimary($isPrimary)
    {
        $this->isPrimary = $isPrimary;
    }

    /**
     * @return bool
     */
    public function isRevoked()
    {
        return $this->isRevoked;
    }

    /**
     * @param bool $isRevoked
     * @return void
     */
    public function setIsRevoked($isRevoked)
    {
        $this->isRevoked = $isRevoked;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @param int|null $expireDate
     * @return void
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;
    }

    /**
     * @return int|null
     */
    public function getMemberLimit()
    {
        return $this->memberLimit;
    }

    /**
     * @param int|null $memberLimit
     * @return void
     */
    public function setMemberLimit($memberLimit)
    {
        $this->memberLimit = $memberLimit;
    }

    /**
     * @return int|null
     */
    public function getPendingJoinRequestCount()
    {
        return $this->pendingJoinRequestCount;
    }

    /**
     * @param int|null $pendingJoinRequestCount
     * @return void
     */
    public function setPendingJoinRequestCount($pendingJoinRequestCount)
    {
        $this->pendingJoinRequestCount = $pendingJoinRequestCount;
    }
}
