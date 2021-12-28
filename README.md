# Add files attachment to send email

The purpose we allow sent an email with an attachment

## How to use ?

```bash
    $pdfFile = BP.'/pub/media/email/attachment/Receivable.pdf';
    $fileName = 'Receivable.pdf';
    $attachmentManager = $this->_objectManager->get(\GGGPDM\SendEmailAttachment\Model\AttachmentManager::class);
    $attachmentManager->addAttachment(file_get_contents($pdfFile), $fileName);
    $this->_transportBuilder
      ->setTemplateIdentifier('mpsmtp_test_email_template')
      ->setTemplateOptions(['area' => Area::AREA_FRONTEND, 'store' => Store::DEFAULT_STORE_ID])
      ->setTemplateVars([])
      ->setFrom($from)
      ->addTo($params['to']);
```
