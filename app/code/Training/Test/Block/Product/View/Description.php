<?php

namespace Training\Test\Block\Product\View;

class Description
{
    public function beforeToHtml(
        \Magento\Catalog\Block\Product\View\Description $subject
    ) {
//        $subject->getProduct()->setDescription('Test Description 333');
        $subject->setTemplate('Training_Test::description.phtml');
    }
}