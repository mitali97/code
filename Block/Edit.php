<?php
namespace Mit\Hello\Block;
  
class Edit extends \Magento\Framework\View\Element\Template
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
      $id = $this->getRequest()->getParams();
      $info = $test->load($id);
      return $info;

    }
    
    
}