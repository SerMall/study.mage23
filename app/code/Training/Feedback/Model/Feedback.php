<?php

namespace Training\Feedback\Model;

use \Training\Feedback\Api\Data\FeedbackExtensionInterface;

class Feedback extends \Magento\Framework\Model\AbstractExtensibleModel implements \Training\Feedback\Api\Data\FeedbackInterface
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $_eventPrefix = 'training_feedback_collection';
    protected $_eventObject = 'feedback_collection';

    protected function _construct()
    {
        $this->_init(\Training\Feedback\Model\ResourceModel\Feedback::class);
    }

    public function getId()
    {
        return $this->getData(self::FEEDBACK_ID);
    }

    public function getAuthorName()
    {
        return $this->getData(self::AUTHOR_NAME);
    }

    public function getAuthorEmail()
    {
        return $this->getData(self::AUTHOR_EMAIL);
    }

    public function getMessage()
    {
        return $this->getData(self::MESSAGE);
    }

    public function getCreatingTime()
    {
        return $this->getData(self::CREATING_TIME);
    }

    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    public function getIsActive()
    {
        return (bool)$this->getData(self::IS_ACTIVE);
    }

    public function setId($id)
    {
        return $this->setData(self::FEEDBACK_ID, $id);
    }

    public function setAuthorName($authorName)
    {
        return $this->setData(self::AUTHOR_NAME, $authorName);
    }

    public function setAuthorEmail($authorEmail)
    {
        return $this->setData(self::AUTHOR_EMAIL, $authorEmail);
    }

    public function setMessage($message)
    {
        return $this->setData(self::MESSAGE, $message);
    }

    public function setCreatingTime($creatingTime)
    {
        return $this->setData(self::CREATING_TIME, $creatingTime);
    }

    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    public function setExtensionAttributes(\Training\Feedback\Api\Data\FeedbackExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}