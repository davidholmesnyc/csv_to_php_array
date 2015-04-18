## PHP CSV to Associative Array
		
### A wrapper to turn CSV's with headers to PHP's associative arrays.

I wrote this because sometimes I rather use PHP's native associative arrays than loop the csv.

## Example

#### code
```php
  $csv = new csv;
  $csv = $csv->to_array($file = 'example.csv');
  var_dump($csv);
```

#### output

```php 
Array
(
    [0] => Array
        (
            [header1] => test1
            [header2] => test1
            [header3] => test1
        )

    [1] => Array
        (
            [header1] => test2
            [header2] => test2
            [header3] => test2
        )

    [2] => Array
        (
            [header1] => test3
            [header2] => test3
            [header3] => test3
        )

)

```