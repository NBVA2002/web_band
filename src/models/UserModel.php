<?php
class UserModel extends Model
{

    protected $_table = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    public function createModel($data)
    {
        return parent::create($this->_table, $data);
    }

    public function updateModel($id, $data)
    {
        return parent::update($this->_table, $id, $data);
    }

    public function deleteModel($id)
    {
        return parent::delete($this->_table, $id);
    }

    public function getList($condition='')
    {
        return parent::findAll($this->_table,$condition);
    }

    public function getDetail($id)
    {
        return parent::findById($this->_table, $id);
    }
    
    public function findByEmail($email)
    {
        return parent::findAll($this->_table, "WHERE email = '".$email."'");
    }
}
