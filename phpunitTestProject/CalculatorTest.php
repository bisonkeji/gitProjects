<?php

 

namespace App\tests;

require_once __DIR__ . '/vendor/autoload.php';

require "Calculator.php";

 

use PHPUnit\Framework\TestCase;

 

 

class CalculatorTest extends TestCase

{

    public function testSum()

    {

        $obj = new Calculator;

        $this->assertEquals(1, $obj->sum(1, 0));

 

    }

 

}

// $CalculatorTest = new CalculatorTest();
// $CalculatorTest->testSum();