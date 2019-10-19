<?php

/**
 * Ecomteck
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Ecomteck.com license that is
 * available through the world-wide-web at this URL:
 * https://www.ecomteck.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Ecomteck
 * @package     Ecomteck_ShareCart
 * @copyright   Copyright (c) Ecomteck (https://www.ecomteck.com/)
 * @license     https://www.ecomteck.com/LICENSE.txt
 */

namespace Ecomteck\ShareCart\Controller\Index;

use Magento\Checkout\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Ecomteck\ShareCart\Helper\PrintProcess;
use Ecomteck\ShareCart\Model\Template\Processor;
use Mpdf\Mpdf;

/**
 * Class Download
 * @package Ecomteck\ShareCart\Controller\Index
 */
class Download extends Action
{
    /**
     * @var Processor
     */
    protected $templateProcessor;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     * @var PrintProcess
     */
    protected $printProcess;

    /**
     * Download constructor.
     * @param Context $context
     * @param Session $checkoutSession
     * @param Processor $templateProcessor
     * @param PrintProcess $printProcess
     */
    public function __construct(
        Context $context,
        Session $checkoutSession,
        Processor $templateProcessor,
        PrintProcess $printProcess
    )
    {
        $this->checkoutSession   = $checkoutSession;
        $this->templateProcessor = $templateProcessor;
        $this->printProcess      = $printProcess;

        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     * @throws \Magento\Framework\Exception\FileSystemException
     * @throws \Mpdf\MpdfException
     */
    public function execute()
    {
        $html = $this->printProcess->readFile($this->printProcess->getBaseTemplatePath() . 'template.html');
        $mpdf = new Mpdf(['tempDir' => BP . '/var/tmp']);

        $storeId   = $this->checkoutSession->getQuote()->getStoreId();
        $processor = $this->templateProcessor->setVariable(
            $this->printProcess->addCustomTemplateVars($storeId)
        );
        $processor->setTemplateHtml($html);
        $processor->setStore($storeId);
        $html = $processor->processTemplate();
        $mpdf->WriteHTML($html);
        $mpdf->Output($this->printProcess->getFileName(), 'D');
    }
}