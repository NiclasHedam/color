<?php

namespace NiclasHedam;

class Color
{
    public $red;
    public $green;
    public $blue;

    private function __construct($red, $green, $blue)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    public static function fromRGB($red, $green, $blue){
        return new Color($red, $green, $blue);
    }

    public static function fromCMYK($cyan, $magenta, $yellow, $key){
        $cyan = $cyan / 100;
        $magenta = $magenta / 100;
        $yellow = $yellow / 100;
        $key = $key / 100;

        $r = 1 - ($cyan * (1 - $key)) - $key;
        $g = 1 - ($magenta * (1 - $key)) - $key;
        $b = 1 - ($yellow * (1 - $key)) - $key;

        $this->red = round($r * 255);
        $this->green = round($g * 255);
        $this->blue = round($b * 255);
    }

    public function differenceBetween(Color $color){
        return round(sqrt(
                pow($this->red - $color->red, 2)
            +   pow($this->green - $color->green, 2)
            +   pow($this->blue - $color->blue, 2)
        ) / 441.6729559300637 * 100, 4);
    }

    function toHEX()
    {
        return '#' . sprintf('%02x', $this->red) . sprintf('%02x', $this->green) . sprintf('%02x', $this->blue);
    }

    function toCMYK($r, $g, $b) {
      $c = (255 - $this->red) / 255.0 * 100;
      $m = (255 - $this->green) / 255.0 * 100;
      $y = (255 - $this->blue) / 255.0 * 100;

      $b = min(array($c,$m,$y));
      $c = $c - $b;
      $m = $m - $b;
      $y = $y - $b;

      return array( 'c' => $c, 'm' => $m, 'y' => $y, 'k' => $b);
    }

    public function name(){
        return ColorName::nameFromRGB($this->red, $this->green, $this->blue);
    }
}
