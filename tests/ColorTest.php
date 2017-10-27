<?php

require_once __DIR__.'/../vendor/autoload.php';

use NiclasHedam\Color;
use PHPUnit\Framework\TestCase;


class ColorTest extends TestCase
{
    public $color1;
    public $color2;
    public $color3;
    public $color4;

    public $color5;
    public $color6;
    public $color7;
    public $color8;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->color1 = Color::fromRGB(0, 0, 0); //Black
        $this->color2 = Color::fromRGB(255, 255, 255); //White
        $this->color3 = Color::fromRGB(255, 153, 102); //Atomic Tangerine
        $this->color4 = Color::fromRGB(102, 255, 255); //Electric Blue

        $this->color5 = Color::fromCMYK(47, 48, 0, 68);
        $this->color6 = Color::fromCMYK(0, 85, 85, 49);
        $this->color7 = Color::fromCMYK(15, 39, 23, 82);
        $this->color8 = Color::fromCMYK(47, 11, 86, 0);
    }

    public function testLikeliness()
    {
        $this->assertEquals(100, $this->color1->differenceBetween($this->color2)); //100
        $this->assertEquals(100, $this->color2->differenceBetween($this->color1)); //100
        $this->assertEquals(41.6333, $this->color3->differenceBetween($this->color2));
        $this->assertEquals(41.6333, $this->color2->differenceBetween($this->color3));
        $this->assertEquals(54.1603, $this->color3->differenceBetween($this->color4));
    }

    public function testName()
    {
        $this->assertEquals('Black', $this->color1->name());
        $this->assertEquals('White', $this->color2->name());
        $this->assertEquals('Atomic Tangerine', $this->color3->name());
        $this->assertEquals('Electric Blue', $this->color4->name());
    }

    public function testConversion()
    {
        $this->assertEquals(['r' => 43, 'g' => 42, 'b' => 82], $this->color5->toRGB());
        $this->assertEquals(['r' => 130, 'g' => 20, 'b' => 20], $this->color6->toRGB());
        $this->assertEquals(['r' => 39, 'g' => 28, 'b' => 35], $this->color7->toRGB());
        $this->assertEquals(['r' => 135, 'g' => 227, 'b' => 36], $this->color8->toRGB());

        $this->assertEquals(['c' => 0.0, 'm' => 0.0, 'y' => 0.0, 'k' => 100.0], $this->color1->toCMYK());
        $this->assertEquals(['c' => 0.0, 'm' => 0.0, 'y' => 0.0, 'k' => 0.0], $this->color2->toCMYK());
        $this->assertEquals(['c' => 0.0, 'm' => 40.0, 'y' => 60.0, 'k' => 0.0], $this->color3->toCMYK());
        $this->assertEquals(['c' => 60.0, 'm' => 0.0, 'y' => 0.0, 'k' => 0.0], $this->color4->toCMYK());


        $this->assertEquals('#000000', $this->color1->toHEX());
        $this->assertEquals('#FFFFFF', $this->color2->toHEX());
    }

    public function testInvalids()
    {
        try {
            Color::fromRGB(215, 242, 275);
            $this->fail();
        } catch (Exception $e) {
        }

        try {
            Color::fromRGB(-252, 242, 35);
            $this->fail();
        } catch (Exception $e) {
        }

        try {
            $color = Color::fromCMYK(105, 45, 23, 66);
            $this->fail();
        } catch (Exception $e) {
        }
    }
}
