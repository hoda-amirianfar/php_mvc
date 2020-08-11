<?php

abstract class AbstractBase
{
    protected $context = [];
    protected $view = '';

    public function run($action)
    {
        $this->addContext('action', $action);

        $methodName = $action . 'Action';
        $this->setView($methodName);

        if (method_exists($this, $methodName)) {
            $this->$methodName();
        } else {
            $this->render404();
        }

        $this->render();
    }

    public function render404()
    {
        header('HTTP/1.0 404 Not Found');
        die('Error 404');
    }

    protected function setView($view, $controller = null)
    {
        if (empty($controller)) {
            $controller = get_class($this);
        }

        $this->view = $controller . '/' . $view . '.tpl.php';
    }

    protected function getView()
    {
        return $this->view;
    }

    protected function addContext($key, $value)
    {
        $this->context[$key] = $value;
    }

    protected function render()
    {
        extract($this->context);

        $view = $this->getView();

        require_once 'views/layout.tpl.php';
    }
}
