<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class Document extends BaseType implements TypeInterface
{
    /**
     * @var array
     */
    protected static array $map = [
        'file_id' => true,
        'thumb' => PhotoSize::class,
        'file_name' => true,
        'mime_type' => true,
        'file_size' => true
    ];

    /**
     * @var string[]
     */
    protected static array $requiredParams = ['file_id'];

    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected string $fileId;

    /**
     * Document thumbnail as defined by sender
     *
     * @var PhotoSize
     */
    protected PhotoSize $thumb;

    /**
     * Optional. Original filename as defined by sender
     *
     * @var string
     */
    protected string $fileName;

    /**
     * Optional. MIME type of the file as defined by sender
     *
     * @var string
     */
    protected string $mimeType;

    /**
     * Optional. File size
     *
     * @var int
     */
    protected int $fileSize;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     */
    public function setFileId(string $fileId): void
    {
        $this->fileId = $fileId;
    }

    /**
     * @return PhotoSize
     */
    public function getThumb(): PhotoSize
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize $thumb
     */
    public function setThumb(PhotoSize $thumb): void
    {
        $this->thumb = $thumb;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     */
    public function setMimeType(string $mimeType): void
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     */
    public function setFileSize(int $fileSize): void
    {
        $this->fileSize = $fileSize;
    }
}
