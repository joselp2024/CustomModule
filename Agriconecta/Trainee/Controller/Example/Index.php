<?php
namespace Agriconecta\Trainee\Controller\Example;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class Index implements HttpGetActionInterface
{
    const XML_PATH_MODULE_ENABLED = 'agriconecta_trainee/general/enabled';

    protected $resultPageFactory;
    protected $scopeConfig;
    protected $redirectFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ScopeConfigInterface $scopeConfig,
        RedirectFactory $redirectFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->scopeConfig = $scopeConfig;
        $this->redirectFactory = $redirectFactory;
    }

    public function execute()
    {
        $moduleIsEnabled = $this->scopeConfig->getValue(self::XML_PATH_MODULE_ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        if (!$moduleIsEnabled) {
            return $this->redirectFactory->create()->setPath('no_route');
        }

        return $this->resultPageFactory->create();
    }
}
