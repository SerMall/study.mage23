<?php

namespace Training\Test\Controller\Action;

class Index extends \Magento\Framework\App\Action\Action
{
    private $resultRawFactory;
    private $layoutFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\RawFactory $resultRawFactory,
        \Magento\Framework\View\LayoutFactory $layoutFactory
    ) {
        parent::__construct($context);
        $this->resultRawFactory = $resultRawFactory;
        $this->layoutFactory = $layoutFactory;
    }

    public function execute()
    {
        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock(\Magento\Framework\View\Element\Template::class);
        $block->setTemplate('Training_Test::test.phtml');
        $resultPage = $this->resultRawFactory->create();
        return $resultPage->setContents($block->toHtml());
    }
}
