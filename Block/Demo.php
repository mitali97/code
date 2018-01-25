<?php
namespace Mit\Hello\Block;
  
class Demo extends \Magento\Framework\View\Element\Template
{   
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Mit\Hello\Model\TestFactory $testFactory
    )
    {
        $this->_testFactory = $testFactory;
        parent::__construct($context);
    }
    public function _prepareLayout()
    {
        $test = $this->_testFactory->create();        
        $getCollection = $test->getCollection();
        return $getCollection;
    }
    
}