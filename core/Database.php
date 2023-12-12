<?php
class Database
{

    private $__conn;

    public function __construct()
    {
        global $db_config;
        $this->__conn = Connection::getInstance($db_config);
    }

    public function query($sql)
    {
        try {
            $statement = $this->__conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (Exception $e) {
            $mess = $e->getMessage();
            $data['message'] = $mess;
            App::$app->loadError('database', $data);
            die();
        }
    }

    public function lastInsertId()
    {
        return $this->__conn->lastInsertId();
    }
}
