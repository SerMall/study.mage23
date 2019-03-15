<?php

namespace Training\Feedback\Api;

interface FeedbackRepositoryInterface
{
    /**
     * @param Data\FeedbackInterface $feedback
     * @return \Training\Feedback\Api\Data\FeedbackInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Training\Feedback\Api\Data\FeedbackInterface $feedback);

    /**
     * @param  $feedbackId
     * @return \Training\Feedback\Api\Data\FeedbackInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($feedbackId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Training\Feedback\Api\Data\FeedbackSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param Data\FeedbackInterface $feedback
     * @return bool true on success
     * @throws
     */
    public function delete(\Training\Feedback\Api\Data\FeedbackInterface $feedback);

    /**
     * @param int $feedbackId
     * @return bool true on success
     * @throws
     * @throws
     */
    public function deleteById($feedbackId);
}