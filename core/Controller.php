<?php
include('core/View.php');
class Controller
{
    public function model($model)
    {
        if (file_exists(_DIR_ROOT . '/src/models/' . $model . '.php')) {
            require_once _DIR_ROOT . '/src/models/' . $model . '.php';
            if (class_exists($model)) {
                $model = new $model();
                return $model;
            }
        }
        return false;
    }

    public function render($view, $data = [])
    {
        if (!empty(View::$dataShare)) {
            $data = array_merge($data, View::$dataShare);
        }

        extract($data);
        if (file_exists(_DIR_ROOT . '/src/views/' . $view . '.php')) {
            require_once _DIR_ROOT . '/src/views/' . $view . '.php';
        }
    }
    

}
