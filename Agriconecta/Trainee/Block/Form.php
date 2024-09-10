<?php
namespace Agriconecta\Trainee\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\UrlInterface;

class Form extends Template
{
    protected $urlBuilder;

    public function __construct(
        Template\Context $context,
        UrlInterface $urlBuilder
  
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context);
    }

    public function getFormActionUrl()
    {
        return $this->urlBuilder->getUrl('ejemplo/save/save');
    }
}
