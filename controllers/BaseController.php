<?php
    class BaseController
    {
        protected $folder;
        function render($file, $data = array())
        {
            $view_file = 'views/' . $this->folder . '/' . $file . '.php';
            if (is_file($view_file)) {
                extract($data);//$data thành array
                ob_start();
                $content = ob_get_clean();
                require_once('layouts/header.php');
                require_once($view_file);
                require_once('layouts/footer.php');
            } /*else {
                header('Location: index.php?controller=contact&action=error');
            }*/
        }
    }