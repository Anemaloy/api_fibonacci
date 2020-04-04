<?php

class Fibanacci {

    public $redis = null;

    public function __construct()
    {
        $this->redis = new Predis\Client();
    }

    public function getData($params)
    {
        if ($this->checkParam($params['from'], $params['to'])) {
            $result = array();
            for ($n = (int)$params['from']; $n <= (int)$params['to']; $n++) {
                if ($this->redis->exists($n)) {
                    $result[] =  (int)$this->redis->get($n);
                } else {
                    $value = (int)$this->getFibonacci($n);
                    $result[] = $value;
                    $this->redis->set($n, $value);
                }
            }
            return json_encode($result);
        } else {
            throw new RuntimeException('Invalid parametrs', 405);
        }

    }

    public function checkParam ($from, $to) {
        if (((int)$from >= 0 && $from != null) && ((int)$to >= 0 && $to != null)) {
           if ($from < $to) {
               return true;
           } else {
               return false;
           }
        }
    }

    public function getFibonacci($n)
    {
        if ($n < 3) {
            return 1;
        }
        else {
            return $this->getFibonacci($n-1) + $this->getFibonacci($n-2);
        }
    }



}

?>