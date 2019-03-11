<?php

namespace Training\Js\Controller\Review;

class Index extends \Magento\Framework\App\Action\Action
{
    private $jsonResultFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory
    )
    {
        parent::__construct($context);
        $this->jsonResultFactory = $jsonResultFactory;
    }

    public function execute()
    {
        $result = $this->jsonResultFactory->create();
        $result->setData($this->getRandomReviewData());
        return $result;
    }

    private function getRandomReviewData()
    {
        $reviews = [
            [
                'name' => 'Reviewer 1',
                'message' => 'TEXT 1'
            ],
            [
                'name' => 'Reviewer 2',
                'message' => 'TEXT 2'
            ],
            [
                'name' => 'Reviewer 3',
                'message' => 'TEXT 3'
            ],
            [
                'name' => 'Reviewer 4',
                'message' => 'TEXT 4'
            ],
        ];

        return $reviews[rand(0, 3)];
    }
}
