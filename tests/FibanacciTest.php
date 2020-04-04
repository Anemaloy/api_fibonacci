<?php

require_once './vendor/autoload.php';
require './libs/predis/autoload.php';
use PHPUnit\Framework\TestCase;

require_once './fibanacci/models/Fibanacci.php';

class FibanacciTest extends TestCase
{
    public function testgetFibonacci()
    {
        $my = new Fibanacci();
        $this->assertEquals(3, $my->getFibonacci(4));
    }

    public function testcheckParam()
    {
        $my = new Fibanacci();
        $this->assertEquals(true, $my->checkParam(4, 5));
    }

    public function testgetData()
    {
        $my = new Fibanacci();
        $params['from'] = 1;
        $params['to'] = 6;
        $result = array(1,1,2,3,5,8);
        $this->assertSame($result, json_decode($my->getData($params)));
    }

}