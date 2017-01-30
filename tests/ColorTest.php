<?php

require_once __DIR__.'/../vendor/autoload.php';

use NiclasHedam\Color;

class ColorTest extends \PHPUnit_Framework_TestCase
{
    var $color1;
    var $color2;
    var $color3;
    var $color4;

    public function __construct()
    {
        $this->color1 = Color::fromRGB(0,0,0); //Black
        $this->color2 = Color::fromRGB(255,255,255); //White
        $this->color3 = Color::fromRGB(255,153,102); //Atomic Tangerine
        $this->color4 = Color::fromRGB(102,255,255); //Light blue
    }

    public function testLikeliness(){
        $this->assertEquals($this->color1->differenceBetween($this->color2), 100); //100
        $this->assertEquals($this->color2->differenceBetween($this->color1), 100); //100
        $this->assertEquals($this->color3->differenceBetween($this->color2), 41.6333);
        $this->assertEquals($this->color2->differenceBetween($this->color3), 41.6333);
        $this->assertEquals($this->color3->differenceBetween($this->color4), 54.1603);
    }

    public function testName(){
        $this->assertEquals($this->color1->name(), "Black");
        $this->assertEquals($this->color2->name(), "White");
        $this->assertEquals($this->color3->name(), "Atomic Tangerine");
        $this->assertEquals($this->color4->name(), false);
    }
}
