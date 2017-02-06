# Color
[![Build Status](https://scrutinizer-ci.com/g/NiclasHedam/color/badges/build.png?b=master)](https://scrutinizer-ci.com/g/NiclasHedam/color/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/NiclasHedam/color/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/NiclasHedam/color/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/NiclasHedam/color/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/NiclasHedam/color/?branch=master)

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
$black->name(); // "Black" (Will return false if name is not found)
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

## Credits

This package is made possible with help from [Frax.dk Development](https://frax.dk) and [Hedam Technologies IvS](https://hedam.org).

## License

Released under the Apache License 2.0
