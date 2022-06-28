<?php

namespace Skfz\Sales\Block;

class Invoice extends \Magento\Framework\View\Element\Template {
	
	private $_invoiceRepository;

	private $_invoice;

	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Magento\Sales\Api\InvoiceRepositoryInterface $invoiceRepository
	) {
		$this->_invoiceRepository = $invoiceRepository;
		parent::__construct($context);
	}

	public function getInvoice() {
		if (!$this->_invoice) {
			$invoiceId = $this->getInvoiceId();
			$this->_invoice = $this->_invoiceRepository->get($invoiceId);
		}
		return $this->_invoice;
	}

	public function getOrder() {
		$invoice = $this->getInvoice();
		
		return $invoice->getOrder();
	}

	public function getOrderAddress() {
		$address = $this->getOrder()->getBillingAddress();
		return $address;
	}

	public function getPaymentMethod() {
		$order = $this->getOrder();
		$payment = $order->getPayment();
		return $payment->getMethodInstance()->getTitle();
	}

	public function formatProductOptions($itemOptions) {
		$options = [];
		if (isset($itemOptions['attributes_info']) && !empty($itemOptions['attributes_info'])) 
		{             
			foreach ($itemOptions['attributes_info'] as $option) 
			{      
				$options[$option['label']] = $option['value'];   
			}
		}
		return $options;
	}
}