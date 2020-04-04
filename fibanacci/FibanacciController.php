<?php

require_once 'Controller.php';
require_once 'models/Fibanacci.php';

class FibanacciController extends Controller {

    public function viewAction()
    {
       $fibanaci = new Fibanacci();
       $result = $fibanaci->getData($this->requestParams);
       return $result;
    }

    public function indexAction()
    {
        throw new RuntimeException('Invalid parametrs', 405);
    }

}

?>