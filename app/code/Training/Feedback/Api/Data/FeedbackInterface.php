<?php

namespace Training\Feedback\Api\Data;

interface FeedbackInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    const FEEDBACK_ID = 'feedback_id';
    const AUTHOR_NAME = 'author_name';
    const AUTHOR_EMAIL = 'author_email';
    const MESSAGE = 'message';
    const CREATING_TIME = 'creating_time';
    const UPDATE_TIME = 'update_time';
    const IS_ACTIVE = 'is_active';

    public function getId();

    public function getAuthorName();

    public function getAuthorEmail();

    public function getMessage();

    public function getCreatingTime();

    public function getUpdateTime();

    public function getIsActive();

    public function setId($id);

    public function setAuthorName($authorName);

    public function setAuthorEmail($authorEmail);

    public function setMessage($message);

    public function setCreatingTime($creatingTime);

    public function setUpdateTime($updateTime);

    public function setIsActive($isActive);

    public function getExtensionAttributes();

    public function setExtensionAttributes(
        \Training\Feedback\Api\Data\FeedbackExtensionInterface $extensionAttributes
    );
}