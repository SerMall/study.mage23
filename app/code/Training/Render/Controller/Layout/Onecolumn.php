<?php

namespace Training\Render\Controller\Layout;

//
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\Context;

class Onecolumn extends \Magento\Framework\App\Action\Action implements HttpGetActionInterface
{
    private $resultPageFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}