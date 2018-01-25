<?php
namespace Excellence\Hello\Model;
class LoginDetail extends \Magento\Framework\Model\AbstractModel implements \Excellence\Hello\Api\Data\LoginDetailInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'excellence_hello_logindetail';

    protected function _construct()
    {
        $this->_init('Excellence\Hello\Model\ResourceModel\LoginDetail');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function loadByEmail($email){
        if(!$email){
            $email = $this->getEmail();
            //random data logic. can be much more complex.
            //this is just example
        }
        $id = $this->getResource()->loadByEmail($email);
        return $this->load($id);
    }
}
