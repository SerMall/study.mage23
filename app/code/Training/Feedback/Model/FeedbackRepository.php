<?php

namespace Training\Feedback\Model;

use Training\Feedback\Api\Data;
use Training\Feedback\Api\FeedbackRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Training\Feedback\Model\ResourceModel\Feedback as FeedbackResource;
use Training\Feedback\Api\Data\FeedbackInterfaceFactory as FeedbackFactory;
use Training\Feedback\Model\ResourceModel\Feedback\CollectionFactory as FeedbackCollectionFactory;

class FeedbackRepository implements FeedbackRepositoryInterface
{
    private $resource;
    private $feedbackFactory;
    private $feedbackCollectionFactory;
    private $searchResultsFactory;
    private $collectionProcessor;


    public function __construct(
        FeedbackResource $resource,
        FeedbackFactory $feedbackFactory,
        FeedbackCollectionFactory $feedbackCollectionFactory,
        \Training\Feedback\Api\Data\FeedbackSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->feedbackFactory = $feedbackFactory;
        $this->feedbackCollectionFactory = $feedbackCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function save(\Training\Feedback\Api\Data\FeedbackInterface $feedback)
    {
        try{
            $this->resource->save($feedback);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the feedback: %1', $exception->getMessage()),
                $exception
            );
        }
        return $feedback;
    }

    public function getById($feedbackId)
    {
        $feedback = $this->feedbackFactory->create();
        $this->resource->load($feedback, $feedbackId);
        if (!$feedback->getId()) {
            throw new NoSuchEntityException(__('Feedback with id "%1" does not exist.', $feedbackId));
        }
        return $feedback;
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \Training\Feedback\Model\ResourceModel\Feedback\Collection $collection */
        $collection = $this->feedbackCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var \Training\Feedback\Api\Data\FeedbackSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->getTotalCount($collection->getSize());
        return $searchResults;
    }

    public function delete(\Training\Feedback\Api\Data\FeedbackInterface $feedback)
    {
        try{
            $this->resource->delete($feedback);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the feedback: %1', $exception->getMessage())
            );
        }
        return true;
    }

    public function deleteById($feedbackId)
    {
        $this->delete($this->getById($feedbackId));
    }
}