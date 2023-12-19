<?php
class TicketModel extends Model{
    protected $_table = 'ticket';

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

    public function getListModel($condition = '')
    {
        return parent::findAll($this->_table, $condition);
    }

    public function getDetailModel($id)
    {
        return parent::findById($this->_table, $id);
    }

    public function getTicketInStock($id, $quantity)
    {
        return parent::findAll($this->_table, "WHERE tour_id = ".$id." AND status = 'IN_STOCK' LIMIT ".$quantity);
    }
}