<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class ChatInviteLink extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['invite_link', 'creator'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
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
     * @var string
     */
    protected $inviteLink;

    /**
     * @var User
     */
    protected $creator;

    /**
     * @var bool
     */
    protected $createsJoinRequest;

    /**
     * @var bool
     */
    protected $isPrimary;

    /**
     * @var bool
     */
    protected $isRevoked;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $expireDate;

    /**
     * @var int
     */
    protected $memberLimit;

    /**
     * @var int
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
        return $this->createsJoinRequest;
    }

    /**
     * @param bool $createsJoinRequest
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
     */
    public function setIsRevoked($isRevoked)
    {
        $this->isRevoked = $isRevoked;
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
        return $this->expireDate;
    }

    /**
     * @param int $expireDate
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;
    }

    /**
     * @return int
     */
    public function getMemberLimit()
    {
        return $this->memberLimit;
    }

    /**
     * @param int $memberLimit
     */
    public function setMemberLimit($memberLimit)
    {
        $this->memberLimit = $memberLimit;
    }

    /**
     * @return int
     */
    public function getPendingJoinRequestCount()
    {
        return $this->pendingJoinRequestCount;
    }

    /**
     * @param int $pendingJoinRequestCount
     */
    public function setPendingJoinRequestCount($pendingJoinRequestCount)
    {
        $this->pendingJoinRequestCount = $pendingJoinRequestCount;
    }


}
