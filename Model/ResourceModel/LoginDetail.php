<?php
namespace Excellence\Hello\Model\ResourceModel;
class LoginDetail extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('excellence_hello_logindetail','excellence_hello_logindetail_id');
    }

     public function loadByEmail($email){
        $table = $this->getMainTable();
        $where = $this->getConnection()->quoteInto("email = ?", $email);
        $sql = $this->getConnection()->select()->from($table,array('MAX(excellence_hello_logindetail_id) as max_id'))
        ->group(array('email'))
        ->order('max_id desc')
        ->where($where);
        $id = $this->getConnection()->fetchOne($sql);
        return $id;
    }
}
