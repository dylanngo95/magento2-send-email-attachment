<?php

declare(strict_types=1);

namespace GGGPDM\SendEmailAttachment\Model;

/**
 * Class AttachmentManager
 */
class AttachmentManager
{
    /**
     * @var \Magento\Framework\Mail\MimePartInterfaceFactory
     */
    private $mimePartInterfaceFactory;

    /**
     * @var array|null
     */
    private $parts = [];

    /**
     * @param \Magento\Framework\Mail\MimePartInterfaceFactory $mimePartInterfaceFactory
     */
    public function __construct(
        \Magento\Framework\Mail\MimePartInterfaceFactory $mimePartInterfaceFactory
    ) {
        $this->mimePartInterfaceFactory = $mimePartInterfaceFactory;
    }

    /**
     * Reset parts registry
     */
    public function resetParts()
    {
        $this->parts = [];
    }

    /**
     * Returns attachment parts
     * @return array
     */
    public function getParts(): array
    {
        return $this->parts;
    }

    /**
     * Add attachment part to registry
     * @param $part
     */
    public function addPart($part)
    {
        $this->parts[] = $part;
    }

    /**
     * Add Attachment.
     *
     * @param mixed $fileContent
     * @param string $fileName
     * @param string $type
     */
    public function addAttachment($fileContent, string $fileName, string $type = 'application/pdf')
    {
        $attachmentPart = $this->mimePartInterfaceFactory->create(
            [
                'content' => $fileContent,
                'type' => $type,
                'fileName' => $fileName,
                'disposition' => \Laminas\Mime\Mime::DISPOSITION_ATTACHMENT,
                'encoding' => \Laminas\Mime\Mime::ENCODING_BASE64
            ]
        );
        $this->addPart($attachmentPart);
    }

}
