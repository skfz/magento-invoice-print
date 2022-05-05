<?php

namespace Skfz\Sales\Controller\Adminhtml\Order\Invoice;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class PrintAction extends Action implements HttpGetActionInterface {

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute() {
        $invoiceId = $this->getRequest()->getParam('invoice_id');

        $resultPage = $this->resultPageFactory->create();
        //$resultPage->getConfig()->getTitle()->set('Skfz_invoice_' . $invoiceId);

        $block = $resultPage->getLayout()->getBlock('sales.order.printinvoice');
        $block->setData('invoice_id', $invoiceId);
        
        return $resultPage;
    }
}