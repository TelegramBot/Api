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
    protected static $requiredParams = [
        'invite_link',
        'creator',
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
        'is_primary' => true,
        'is_revoked' => true,
        'expire_date' => true,
        'member_limit' => true
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
     * True, if the link is primary
     *
     * @var boolean
     */
    protected $isPrimary;

    /**
     * True, if the link is revoked
     *
     * @var boolean
     */
    protected $isRevoked;

    /**
     * Optional. Point in time (Unix timestamp) when the link will expire or has been expired
     *
     * @var int
     */
    protected $expireDate;

    /**
     * Optional. Maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
     *
     * @var int
     */
    protected $memberLimit;

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
}
