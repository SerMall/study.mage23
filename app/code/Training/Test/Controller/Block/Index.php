<?php

namespace Training\Test\Controller\Block;

use \Magento\Framework\Controller\Result\RawFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    private $rawFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        RawFactory $rawFactory
    )
    {
        $this->rawFactory = $rawFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $raw = $this->rawFactory->create();
        $raw->setContents("<b>Hello world from block!</b>");
        return $raw;
    }
}