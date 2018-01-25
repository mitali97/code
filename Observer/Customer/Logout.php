<?php 
namespace Excellence\Hello\Observer\Customer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
 
 
class Logout implements ObserverInterface
{
    protected $_loginDetailFactory;
    protected $_timezoneInterface;
    protected $_session;

    public function __construct(
        \Excellence\Hello\Model\LoginDetailFactory $loginDetailFactory,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezoneInterface,
        \Magento\Customer\Model\Session $session
        )
    {

        $this->_loginDetailFactory = $loginDetailFactory;
        $this->_timezoneInterface = $timezoneInterface;
    }
 
    public function execute(\Magento\Framework\Event\Observer $observer)
    {   
     $loginInfo = $this->_loginDetailFactory->create();
     $today = $this->_timezoneInterface->date()->format('m/d/y H:i:s');
     $customer = $observer->getEvent()->getCustomer();
     $getInfo = $customer->getData();
     $email = $getInfo['email'];
     $customerLoginInfo = $loginInfo->loadByEmail($email);
     $userLogout_time = $customerLoginInfo->setLogout_time($today);         
     $loginInfo->save($userLogout_time);
     
    }
}
