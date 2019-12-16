<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class Document
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 *
 * @package TelegramBot\Api\Types
 */
class Document extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'file_id' => true,
        'thumb' => PhotoSize::class,
        'file_name' => true,
        'mime_type' => true,
        'file_size' => true
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['file_id'];

    /**
     * Identifier for this file
     *
     * @var string
     */
    protected $fileId;

    /**
     * Optional. Document thumbnail as defined by sender
     *
     * @var PhotoSize|null
     */
    protected $thumb;

    /**
     * Optional. Original filename as defined by sender
     *
     * @var string|null
     */
    protected $fileName;

    /**
     * Optional. MIME type of the file as defined by sender
     *
     * @var string|null
     */
    protected $mimeType;

    /**
     * Optional. File size
     *
     * @var int|null
     */
    protected $fileSize;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     * @return Document
     */
    public function setFileId(string $fileId): Document
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize $thumb
     * @return Document
     */
    public function setThumb(PhotoSize $thumb): Document
    {
        $this->thumb = $thumb;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return Document
     */
    public function setFileName(string $fileName): Document
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     * @return Document
     */
    public function setMimeType(?string $mimeType): Document
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     * @return Document
     */
    public function setFileSize(int $fileSize): Document
    {
        $this->fileSize = $fileSize;

        return $this;
    }
}
