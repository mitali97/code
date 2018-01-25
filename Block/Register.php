<?php
namespace Mit\Hello\Block;
  
class Register extends \Magento\Framework\View\Element\Template
{   
    protected $_testFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Mit\Hello\Model\TestFactory $testFactory
    )
    {
        $this->_testFactory = $testFactory;
        parent::__construct($context);
    }
    protected function _prepareLayout()
    {
      $test = $this->_testFactory->create();
      $userId = $this->getRequest()->getPostValue("id");

        if($userId){
           $userInfo = $test->load($userId);
           $UserName = $userInfo->getName();
           $UserEmail = $userInfo->getEmail();
           $UserPhoneNo = $userInfo->getPhoneNo();
           $UserMessage = $userInfo->getMessage();
           //print_r($UserPhoneNo);exit();
           $test->save($UserName);
           $test->save($UserEmail);
           $test->save($UserPhoneNo);
           $test->save($UserMessage);
           $this->setTestModel($test);   
           }
        
        $test->setName($this->getRequest()->getPostValue("name"));
        $test->setEmail($this->getRequest()->getPostValue("email"));
        $test->setPhoneNo($this->getRequest()->getPostValue("phone"));
        $test->setMessage($this->getRequest()->getPostValue("message"));
        $test->save();
        $this->setTestModel($test);   
          
      
    }
   
}