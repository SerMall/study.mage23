<?php

namespace Training\Feedback\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{
    private $feedbackFactory;
    private $feedbackRepository;
    private $searchCriteriaBuilder;
    private $sortOrdetBuilder;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Training\Feedback\Api\Data\FeedbackInterfaceFactory $feedbackFactory,
        \Training\Feedback\Api\FeedbackRepositoryInterface $feedbackRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\SortOrderBuilder $sortOrdetBuilder
    ) {
        $this->feedbackFactory = $feedbackFactory;
        $this->feedbackRepository = $feedbackRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrdetBuilder = $sortOrdetBuilder;
        parent::__construct($context);
    }

    public function execute()
    {
//        $newFeedback = $this->feedbackFactory->create();
//        $newFeedback->setAuthorName('Some Name');
//        $newFeedback->setAuthorEmail('some@name.com');
//        $newFeedback->setMessage('Some Name Message');
//        $newFeedback->setIsActive(1);
//        $this->feedbackRepository->save($newFeedback);

        $feedback = $this->feedbackFactory->create()->load(8);
        $this->printFeedback($feedback);

        $feedback = $this->feedbackRepository->getById(10);
        $this->printFeedback($feedback);

        $feedback->setMessage('CUSTOM ' . $feedback->getMessage());
        $this->printFeedback($feedback);

//        $this->feedbackRepository->deleteById(9);

        $this->searchCriteriaBuilder
            ->addFilter('is_active', 1);

        $sortOrder = $this->sortOrdetBuilder
            ->setField('feedback_id')
            ->setAscendingDirection()
            ->create();
        $this->searchCriteriaBuilder->addSortOrder($sortOrder);

        $searchCriteria = $this->searchCriteriaBuilder->create();

        $searchResult = $this->feedbackRepository->getList($searchCriteria);
        foreach ($searchResult->getItems() as $item) {
            $this->printFeedback($item);
        }
        exit();
    }

    private function printFeedback($feedback)
    {
        echo $feedback->getId() . ' : '
            . $feedback->getAuthorName()
            . ' (' . $feedback->getAuthorEmail() . ')'
            . ' (' . $feedback->getMessage() . ')';
        echo "<br/>\n";
    }
}