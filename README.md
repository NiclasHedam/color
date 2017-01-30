# CPR
[![Build Status](https://travis-ci.org/NiclasHedam/color.svg?branch=master)](https://travis-ci.org/NiclasHedam/color)

..

## Installation

Install it using composer

`composer require niclashedam/color`

## Usage

Just include it and instantiate the ColorComparison class.


```
use NiclasHedam/Color;

$black = Color::fromRGB(0, 0, 0);
$white = Color::fromCMYK(0, 0, 0, 0);
$black->differenceBetween($white); //100
$black->name(); // "Black" (Will return false if name is not found)
$black->toHEX(); // "#000000"

$orange = Color::fromRGB(255, 165, 0);
$orange->differenceBetween($white);

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
