<?php
namespace Mit\Hello\Block;
  
class Delete extends \Magento\Framework\View\Element\Template
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
        $id=$this->getRequest()->getParams();          
        $data=$test->load($id); 
        $test->delete($data);        
    }
   
    
}