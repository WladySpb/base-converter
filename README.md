# BaseConverter

Convert numbers between any base you want, including negative numbers and floating point numbers

* Including default bases from 2 to 64 symbols
* Convert from and to custom charset
* Convert negative numbers
* Convert floating point numbers(with delimiter, without exponent)
* Customize minus sign and float delimiter  

## Install

Via Composer

``` bash
$ composer require smart-lib/base-converter
```

## Usage

### Simple:

``` php
$converter = new SmartLib/BaseConverter();
echo $converter->convert('100500', 10, 36);
echo $converter->convert('-100500', 10, 36);
echo $converter->convert('100500.99', 10, 64);
```

### Custom charset:
   
   ``` php
   $converter = new SmartLib/BaseConverter();
   echo $converter
       ->from(10)
       ->to(6, 'QWERTY')
       ->convert('100500', 10, 6);
   ```

### Change delimiter, change minus sign:

``` php
$converter = new SmartLib/BaseConverter();
echo $converter
    ->from(10)
    ->to(36, null, ',', '~')
    ->convert('-100.500', 10, 36);
```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](https://github.com/smart-lib/base-converter/blob/master/CONTRIBUTING.md) for details.

## Credits

- [Vladimir Golubev](https://github.com/WladySpb)
- [All Contributors](https://github.com/smart-lib/base-converter/contributors)

## License

The GPL-3.0 License. Please see [License File](LICENSE.md) for more information.
