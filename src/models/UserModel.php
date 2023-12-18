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

    public function updateHome($id, $data)
    {
        return parent::update($this->_table, $id, $data);
    }

    public function deleteUser($id)
    {
        return parent::delete($this->_table, $id);
    }

    public function getList()
    {
        return parent::findAll($this->_table);
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
