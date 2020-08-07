# BaseConverter

Convert numbers between any base you want, including negative numbers and floating point numbers


## Install

Via Composer

``` bash
$ composer require wladyspb/baseconverter
```

## Usage

``` php
$converter = new WladySpb/BaseConverter();
echo $converter->convert(100500, 10, 36);
echo $converter->convert(-100500, 10, 36);
echo $converter->convert(100500.99, 10, 36);
```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](https://github.com/WladySpb/BaseConverter/blob/master/CONTRIBUTING.md) for details.

## Credits

- [:author_name](https://github.com/WladySpb)
- [All Contributors](https://github.com/WladySpb/BaseConverter/contributors)

## License

The GPL-3.0 License. Please see [License File](LICENSE.md) for more information.
