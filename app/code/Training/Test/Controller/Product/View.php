<?php

namespace Training\Test\Controller\Product;

class View extends \Magento\Catalog\Controller\Product

{
    protected $customerSession;
    protected $redirectFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory
    ) {
        $this->customerSession = $customerSession;
        $this->redirectFactory = $redirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->customerSession->isLoggedIn()) {
            return $this->redirectFactory->create()->setPath('customer/account/login');
        }
        return parent::execute();
    }
}