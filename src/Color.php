<?php

namespace NiclasHedam;

use Exception;

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

    public static function fromRGB($red, $green, $blue)
    {
        if ($red < 0 || $red > 255 || $green < 0 || $green > 255 || $blue < 0 || $blue > 255) {
            throw new Exception('Invalid RGB color', 1);
        }
        return new self($red, $green, $blue);
    }

    public static function fromCMYK($cyan, $magenta, $yellow, $key)
    {
        if ($cyan < 0 || $cyan > 100 || $magenta < 0 || $magenta > 100 || $yellow < 0 || $yellow > 100 || $key < 0 || $key > 100) {
            throw new Exception('Invalid CMYK color', 1);
        }
        $cyan = $cyan / 100;
        $magenta = $magenta / 100;
        $yellow = $yellow / 100;
        $key = $key / 100;

        $r = 1 - ($cyan * (1 - $key)) - $key;
        $g = 1 - ($magenta * (1 - $key)) - $key;
        $b = 1 - ($yellow * (1 - $key)) - $key;

        return new self(round($r * 255), round($g * 255), round($b * 255));
    }

    public function differenceBetween(Color $color)
    {
        return round(sqrt(
                pow($this->red - $color->red, 2)
            + pow($this->green - $color->green, 2)
            + pow($this->blue - $color->blue, 2)
        ) / 441.6729559300637 * 100, 4);
    }

    public function toHEX()
    {
        return strtoupper('#'.sprintf('%02x', $this->red).sprintf('%02x', $this->green).sprintf('%02x', $this->blue));
    }

    public function toCMYK()
    {
        $r = $this->red / 255;
        $g = $this->green / 255;
        $b = $this->blue / 255;

        $k = 1 - max([$r, $g, $b]);

        if($k === 1){ //Edgecase.
            return ['c' => 0.0, 'm' => 0.0, 'y' => 0, 'k' => 100.0];
        }

        $c = round((1 - $r - $k) / (1 - $k) * 100, 4);
        $m = round((1 - $g - $k) / (1 - $k) * 100, 4);
        $y = round((1 - $b - $k) / (1 - $k) * 100, 4);


        return ['c' => $c, 'm' => $m, 'y' => $y, 'k' => $k];
    }

    public function toRGB()
    {
        return [
            'r' => $this->red,
            'g' => $this->green,
            'b' => $this->blue,
        ];
    }

    public function name()
    {
        return ColorName::nameFromColor($this);
    }
}
