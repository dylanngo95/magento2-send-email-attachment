<?php

declare(strict_types=1);

namespace GGGPDM\SendEmailAttachment\Plugin\Magento\Framework\Mail;

/**
 * Class MimeMessage
 */
class MimeMessage
{
    /**
     * @var \GGGPDM\SendEmailAttachment\Model\AttachmentManager
     */
    private $attachmentManager;

    /**
     * @param \GGGPDM\SendEmailAttachment\Model\AttachmentManager $attachmentManager
     */
    public function __construct(
        \GGGPDM\SendEmailAttachment\Model\AttachmentManager $attachmentManager
    )
    {
        $this->attachmentManager = $attachmentManager;
    }

    /**
     * Add attachment part in the end of email parts
     *
     * @param \Magento\Framework\Mail\MimeMessage $subject
     * @param array $parts
     * @return array
     */
    public function afterGetParts(
        \Magento\Framework\Mail\MimeMessageInterface $subject,
        array $parts
    ): array {
        $additionalParts = $this->attachmentManager->getParts();
        if (
            count($parts)
            && count($additionalParts)
        ) {
            foreach ($additionalParts as $aPart) {
                $parts[] = $aPart;
            }
        }
        $this->attachmentManager->resetParts();
        return $parts;
    }
}
