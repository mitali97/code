<?php 
namespace Excellence\Hello\Observer\Customer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
 
 
class Authenticated implements ObserverInterface
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
        $customer = $observer->getModel();
        $email = $customer->getEmail();
        $today = $this->_timezoneInterface->date()->format('m/d/y H:i:s');      
        $loginTime = $loginInfo->setLogin_time($today);
        $loginInfo->save($loginTime);
        $loginEmail = $loginInfo->setEmail($email);
        $loginInfo->save($loginEmail);
    }
}
