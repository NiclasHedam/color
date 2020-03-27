# Color
[![Build Status](https://travis-ci.org/NiclasHedam/color.svg?branch=master)](https://travis-ci.org/NiclasHedam/color)
[![Coverage Status](https://coveralls.io/repos/github/NiclasHedam/color/badge.svg?branch=master)](https://coveralls.io/github/NiclasHedam/color?branch=master)
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fniclashedam%2Fcolor.svg?type=shield)](https://app.fossa.io/projects/git%2Bgithub.com%2Fniclashedam%2Fcolor?ref=badge_shield)

This tool providers methods to convert from RGB and CMYK, to RGB, CMYK and HEX.
Also this tool can calculate the relative difference between two given colors.
This cool can also provide you with the name of the color you provided.

## Installation

Install it using composer

`composer require niclashedam/color`

## Usage

Just include it and instantiate the Color class.


```
use NiclasHedam/Color;

$black = Color::fromRGB(0, 0, 0);
$white = Color::fromCMYK(0, 0, 0, 0);
$black->differenceBetween($white); //100
$black->name(); // "Black"
$black->toHEX(); // "#000000"

$orange = Color::fromRGB(255, 165, 0);
$orange->differenceBetween($white); //61.2255

```

See [exampes/example.php](examples/example.php) for more examples

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## License

Released under the MIT license


[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fniclashedam%2Fcolor.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2Fniclashedam%2Fcolor?ref=badge_large)